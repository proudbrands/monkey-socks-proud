// ProudBrands Chatbot Component - Upgraded Version
// Compatible with your existing backend system
const { useState, useEffect, useRef } = React;

const ProudBrandsChatbot = () => {
  const [messages, setMessages] = useState([
    {
      id: 1,
      text: "Hi! I'm here to help you grow your business online. What's your biggest challenge getting found by customers right now?",
      sender: 'bot',
      timestamp: new Date()
    }
  ]);
  const [inputValue, setInputValue] = useState('');
  const [isTyping, setIsTyping] = useState(false);
  
  // NEW: Backend integration variables
  const [conversationId] = useState('conv_' + Date.now() + '_' + Math.floor(Math.random() * 10000));
  const [stage, setStage] = useState('initial');
  const [leadScore, setLeadScore] = useState(0);
  
  const [showContactForm, setShowContactForm] = useState(false);
  const messagesEndRef = useRef(null);

  // Auto-scroll to bottom when new messages arrive
  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: "smooth" });
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  // Simulate typing delay for bot responses
  const addBotMessage = (text, delay = 1500) => {
    setIsTyping(true);
    setTimeout(() => {
      setMessages(prev => [...prev, {
        id: Date.now(),
        text,
        sender: 'bot',
        timestamp: new Date()
      }]);
      setIsTyping(false);
    }, delay);
  };

  // UPGRADED: Call your WordPress REST API with proper backend integration
  const callChatbotAPI = async (userMessage) => {
    try {
      // Use current domain (works on staging and live)
      const apiUrl = window.location.origin + '/wp-json/proudbrands/v1/chat';
      
      console.log('Making API call to:', apiUrl);
      console.log('Request data:', { 
        message: userMessage, 
        conversation_id: conversationId,
        stage: stage,
        leadData: {}
      });
      
      const response = await fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          message: userMessage,
          conversation_id: conversationId,  // NEW: Proper conversation tracking
          stage: stage,                     // NEW: Stage management
          leadData: {}                      // NEW: Lead data structure
        })
      });
      
      console.log('API Response status:', response.status);
      
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      
      const data = await response.json();
      console.log('API Response data:', data);
      
      // NEW: Update conversation state from backend response
      if (data.stage) {
        setStage(data.stage);
        console.log('Stage updated to:', data.stage);
      }
      
      if (data.lead_score !== undefined) {
        setLeadScore(data.lead_score);
        console.log('Lead score updated to:', data.lead_score);
      }
      
      // NEW: Intelligent contact form triggering based on backend logic
      if (data.lead_score >= 7 || data.stage === 'qualify') {
        setShowContactForm(true);
        console.log('Contact form triggered - Score:', data.lead_score, 'Stage:', data.stage);
      }
      
      if (data.code === 'rest_no_route') {
        return "The chatbot API isn't set up yet. Please check the WordPress configuration.";
      }
      
      return data.response || "I'm having a technical moment. Could you try that again?";
    } catch (error) {
      console.error('Chatbot API Error:', error);
      return "I'm having a connection issue. Could you try that again?";
    }
  };

  // Handle user input
  const handleSend = async () => {
    if (!inputValue.trim()) return;

    const userMessage = {
      id: Date.now(),
      text: inputValue.trim(),
      sender: 'user',
      timestamp: new Date()
    };

    setMessages(prev => [...prev, userMessage]);
    const currentInput = inputValue.trim();
    setInputValue('');

    // NEW: Proper backend integration
    const botResponse = await callChatbotAPI(currentInput);
    addBotMessage(botResponse);
  };

  const handleKeyPress = (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      handleSend();
    }
  };

  // UPGRADED: Contact form submission with backend integration
  const handleContactSubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    const contactData = {
      email: formData.get('email'),
      phone: formData.get('phone'),
      best_time: formData.get('best_time')
    };
    
    console.log('Contact form submitted:', contactData);
    
    // NEW: Send contact info as a message to update the lead in backend
    const contactMessage = `My contact details: Email: ${contactData.email}, Phone: ${contactData.phone}, Best time: ${contactData.best_time}`;
    await callChatbotAPI(contactMessage);
    
    // Show success message
    addBotMessage("Brilliant! I've got your details. One of our digital marketing experts will call you within 24 hours to discuss your personalised growth strategy. Thanks for chatting with me!");
    setShowContactForm(false);
  };

  const ContactForm = () => (
    React.createElement('div', {
      className: "bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-lg border-2 border-blue-200 mt-4"
    }, [
      React.createElement('h3', {
        key: 'title',
        className: "text-lg font-semibold mb-4 text-gray-800"
      }, "Get Your Personalised Strategy"),
      React.createElement('p', {
        key: 'subtitle',
        className: "text-sm text-gray-600 mb-4"
      }, `Lead Score: ${leadScore}/10 • Stage: ${stage}`),
      React.createElement('form', {
        key: 'form',
        onSubmit: handleContactSubmit,
        className: "space-y-3"
      }, [
        React.createElement('input', {
          key: 'email',
          type: 'email',
          name: 'email',
          placeholder: 'Your email address',
          required: true,
          className: "w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        }),
        React.createElement('input', {
          key: 'phone',
          type: 'tel',
          name: 'phone',
          placeholder: 'Phone number',
          required: true,
          className: "w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        }),
        React.createElement('select', {
          key: 'time',
          name: 'best_time',
          required: true,
          className: "w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        }, [
          React.createElement('option', { key: 'default', value: '' }, 'Best time to call'),
          React.createElement('option', { key: 'morning', value: 'morning' }, 'Morning (9am-12pm)'),
          React.createElement('option', { key: 'afternoon', value: 'afternoon' }, 'Afternoon (12pm-5pm)'),
          React.createElement('option', { key: 'evening', value: 'evening' }, 'Evening (5pm-7pm)')
        ]),
        React.createElement('button', {
          key: 'submit',
          type: 'submit',
          className: "w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold"
        }, "Get My Free Strategy Session")
      ])
    ])
  );

  return React.createElement('div', {
    className: "max-w-2xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden mb-8"
  }, [
    // Header with NEW debug info
    React.createElement('div', {
      key: 'header',
      className: "bg-gradient-to-r from-blue-600 to-purple-600 p-4 text-white"
    }, React.createElement('div', {
      className: "flex items-center justify-between"
    }, [
      React.createElement('div', {
        key: 'info',
        className: "flex items-center space-x-3"
      }, [
        React.createElement('div', {
          key: 'avatar',
          className: "w-10 h-10 rounded-full overflow-hidden bg-white"
        }, React.createElement('img', {
          src: "https://proudbrands.co.uk/wp-content/uploads/2025/04/inno.png",
          alt: "ProudBrands Assistant",
          className: "w-full h-full object-cover",
          onError: (e) => {
            e.target.style.display = 'none';
            e.target.nextSibling.style.display = 'flex';
          }
        }), React.createElement('div', {
          className: "w-full h-full bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xs",
          style: { display: 'none' }
        }, 'PB')),
        React.createElement('div', { key: 'text' }, [
          React.createElement('h3', {
            key: 'name',
            className: "font-semibold"
          }, "ProudBrands Growth Assistant"),
          React.createElement('p', {
            key: 'desc',
            className: "text-sm opacity-90"
          }, "Helping you grow your business online")
        ])
      ]),
      // NEW: Debug info showing backend integration
      React.createElement('div', {
        key: 'debug',
        className: "text-right text-xs opacity-75"
      }, [
        React.createElement('div', { key: 'stage' }, `Stage: ${stage}`),
        React.createElement('div', { key: 'score' }, `Score: ${leadScore}/10`)
      ])
    ])),

    // Messages
    React.createElement('div', {
      key: 'messages',
      className: "h-96 overflow-y-auto p-4 space-y-4 bg-gray-50"
    }, [
      ...messages.map((message) => 
        React.createElement('div', {
          key: message.id,
          className: `flex ${message.sender === 'user' ? 'justify-end' : 'justify-start'}`
        }, React.createElement('div', {
          className: `max-w-xs lg:max-w-md px-4 py-2 rounded-2xl ${
            message.sender === 'user' 
              ? 'bg-blue-600 text-white rounded-br-sm' 
              : 'bg-white text-gray-800 shadow-md rounded-bl-sm border'
          }`
        }, [
          React.createElement('p', {
            key: 'text',
            className: "text-sm leading-relaxed"
          }, message.text),
          React.createElement('p', {
            key: 'time',
            className: `text-xs mt-1 ${
              message.sender === 'user' ? 'text-blue-100' : 'text-gray-500'
            }`
          }, message.timestamp.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }))
        ]))
      ),
      
      // Typing indicator
      isTyping && React.createElement('div', {
        key: 'typing',
        className: "flex justify-start"
      }, React.createElement('div', {
        className: "bg-white text-gray-800 shadow-md rounded-2xl rounded-bl-sm border px-4 py-2"
      }, React.createElement('div', {
        className: "flex space-x-1 items-center"
      }, [
        React.createElement('span', {
          key: 'typing-text',
          className: "text-xs text-gray-500 mr-2"
        }, 'Typing'),
        React.createElement('div', {
          key: 'dot1',
          className: "w-2 h-2 bg-blue-400 rounded-full animate-bounce"
        }),
        React.createElement('div', {
          key: 'dot2',
          className: "w-2 h-2 bg-blue-400 rounded-full animate-bounce",
          style: { animationDelay: '0.1s' }
        }),
        React.createElement('div', {
          key: 'dot3',
          className: "w-2 h-2 bg-blue-400 rounded-full animate-bounce",
          style: { animationDelay: '0.2s' }
        })
      ]))),
      
      // Contact form - NEW: Triggered by backend logic
      showContactForm && React.createElement(ContactForm, { key: 'contact-form' }),
      
      React.createElement('div', {
        key: 'scroll-anchor',
        ref: messagesEndRef
      })
    ]),

    // Input
    React.createElement('div', {
      key: 'input',
      className: "p-4 border-t bg-white"
    }, React.createElement('div', {
      className: "flex space-x-2"
    }, [
      React.createElement('input', {
        key: 'text-input',
        type: 'text',
        value: inputValue,
        onChange: (e) => setInputValue(e.target.value),
        onKeyPress: handleKeyPress,
        placeholder: "Type your message...",
        className: "flex-1 p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent",
        disabled: isTyping
      }),
      React.createElement('button', {
        key: 'send-btn',
        onClick: handleSend,
        disabled: !inputValue.trim() || isTyping,
        className: "bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
      }, React.createElement('svg', {
        className: "w-5 h-5",
        fill: "none",
        stroke: "currentColor",
        viewBox: "0 0 24 24"
      }, React.createElement('path', {
        strokeLinecap: "round",
        strokeLinejoin: "round",
        strokeWidth: 2,
        d: "M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
      })))
    ]))
  ]);
};

// Initialize the chatbot when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('proudbrands-chatbot-container');
  if (container && typeof React !== 'undefined' && typeof ReactDOM !== 'undefined') {
    ReactDOM.render(React.createElement(ProudBrandsChatbot), container);
    console.log('ProudBrands Chatbot initialized with backend integration!');
  } else {
    console.error('ProudBrands Chatbot: Container not found or React not loaded');
    
    // Create container if it doesn't exist
    if (!container) {
      const newContainer = document.createElement('div');
      newContainer.id = 'proudbrands-chatbot-container';
      document.body.appendChild(newContainer);
      
      // Try again
      if (typeof React !== 'undefined' && typeof ReactDOM !== 'undefined') {
        ReactDOM.render(React.createElement(ProudBrandsChatbot), newContainer);
        console.log('ProudBrands Chatbot initialized (created container)!');
      }
    }
  }
});