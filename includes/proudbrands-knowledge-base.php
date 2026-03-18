<?php
// ProudBrands Knowledge Base for Claude Chatbot
class ProudBrandsKnowledgeBase {
    
    private $services;
    private $case_studies;
    private $company_info;
    private $faqs;
    
    public function __construct() {
        $this->init_knowledge_base();
    }
    
    private function init_knowledge_base() {
        
        // Core Services
        $this->services = [
            'seo' => [
                'name' => 'SEO Services',
                'description' => 'We help local businesses build sustainable online visibility. Like digital gardeners, we nurture your online presence while you sleep.',
                'benefits' => [
                    'Sustainable, ethical optimization that improves visibility without risking penalties',
                    'Focus on the numbers that matter: qualified visitors, enquiries, and sales',
                    'Long-term growth that continues working year after year'
                ],
                'approach' => 'We focus on sustainable, ethical optimization that improves your visibility without risking future penalties. Think of it as making sure your garden gets the perfect amount of sunlight!',
                'keywords' => ['SEO', 'search engine optimization', 'Google rankings', 'online visibility', 'search results', 'organic traffic']
            ],
            
            'web_design' => [
                'name' => 'Website Design & Build',
                'description' => 'We create websites that are designed from the ground up to attract visitors, engage them with valuable content, and guide them towards becoming customers.',
                'benefits' => [
                    'Stunning sites that convert visitors into customers',
                    'Built for performance and user experience',
                    'Mobile-responsive and search engine friendly'
                ],
                'keywords' => ['website design', 'web development', 'website build', 'responsive design', 'user experience']
            ],
            
            'content_marketing' => [
                'name' => 'Content Marketing',
                'description' => 'The heart of any organic strategy is valuable content that answers your customers\' questions.',
                'benefits' => [
                    'Blog posts, guides, videos that attract potential customers',
                    'Position you as an expert in your field',
                    'Content that helps rather than just sells'
                ],
                'keywords' => ['content marketing', 'blog posts', 'content creation', 'valuable content', 'content strategy']
            ],
            
            'email_marketing' => [
                'name' => 'Email Marketing Campaigns',
                'description' => 'Once people have found your business, email marketing helps you nurture those relationships over time.',
                'benefits' => [
                    'Automated marketing campaigns',
                    'Nurture relationships that turn into loyal customers',
                    'Keep your business in mind when they\'re ready to buy'
                ],
                'keywords' => ['email marketing', 'email campaigns', 'automated marketing', 'nurturing', 'relationships']
            ],
            
            'ecommerce' => [
                'name' => 'E-commerce Solutions',
                'description' => 'We build e-commerce platforms that help you sell online effectively.',
                'keywords' => ['ecommerce', 'online shop', 'online store', 'selling online', 'e-commerce platform']
            ],
            
            'local_seo' => [
                'name' => 'Local SEO',
                'description' => 'For businesses serving the local community, appearing in local search results is essential.',
                'benefits' => [
                    'Optimize Google Business Profile',
                    'Local citations optimization',
                    'Help nearby customers find you'
                ],
                'keywords' => ['local SEO', 'Google Business Profile', 'local search', 'nearby customers', 'Aylesbury', 'Buckinghamshire']
            ]
        ];
        
        // Case Studies
        $this->case_studies = [
            'bay_aggregates' => [
                'client' => 'Bay Aggregates',
                'challenge' => 'Family business with solid reputation but virtually no online presence, relied entirely on word-of-mouth',
                'solution' => 'Dual-language website (English/Spanish), hyperlocal SEO for 5 counties, Google Business optimization',
                'results' => 'Digital foundation for generational business continuity, visibility to new customers in service region',
                'keywords' => ['construction', 'building supplies', 'local business', 'family business', 'Spanish market']
            ],
            
            'we_optimise' => [
                'client' => 'We Optimise (formerly White Label RM)',
                'challenge' => 'International recruitment marketing company needed complete rebrand including name change',
                'solution' => 'Complete business rebrand with new name, logo, and web design, ongoing SEO and content development',
                'results' => 'Strengthened digital presence and customer trust, established ongoing collaboration',
                'keywords' => ['recruitment', 'international', 'rebrand', 'enterprise clients', 'Amazon', 'Liberty Global']
            ]
        ];
        
        // Company Information
        $this->company_info = [
            'name' => 'Proud Brands',
            'location' => 'Aylesbury, Buckinghamshire',
            'established' => '2014',
            'type' => 'Family-run digital agency',
            'philosophy' => 'We believe in keeping things simple and effective. Like a good gardener who helps your plants flourish season after season, we\'re here to nurture your online presence.',
            'approach' => 'No hard sell, just honest advice. We\'re your long-term growth partners.',
            'team' => 'Content creators, SEO experts, strategists who ensure everything works together',
            'values' => [
                'Sustainable, long-term growth over quick tricks',
                'Plain English, no technical jargon',
                'Focus on metrics that matter to your business',
                'Building lasting connections with your audience'
            ]
        ];
        
        // Common FAQs
        $this->faqs = [
            'what_is_organic_marketing' => [
                'question' => 'What is organic marketing?',
                'answer' => 'Think of organic marketing as growing your business visibility naturally, without paying for advertising. Just like organic gardening uses natural methods, organic marketing builds your online presence through valuable content, SEO, social media engagement, and relationship building via email.'
            ],
            
            'how_long_results' => [
                'question' => 'How long does it take to see results?',
                'answer' => 'Organic marketing is like growing an oak tree rather than planting annual flowers. You\'ll start seeing initial improvements within 3-4 months, with more significant results around 6-8 months. Once established, it continues working for you long-term.'
            ],
            
            'organic_vs_paid' => [
                'question' => 'What\'s the difference between organic and paid marketing?',
                'answer' => 'Think of organic as planting a garden that will produce for years, while paid is like going to the market for produce right now. Organic builds long-term visibility and trust, while paid drives immediate traffic. Most businesses benefit from both.'
            ]
        ];
    }
    
    // Find relevant information based on user input
    public function find_relevant_content($user_message, $conversation_stage = 'initial', $lead_data = []) {
        $user_message_lower = strtolower($user_message);
        $relevant_content = [];
        
        // Check services
        foreach ($this->services as $service_key => $service) {
            foreach ($service['keywords'] as $keyword) {
                if (strpos($user_message_lower, strtolower($keyword)) !== false) {
                    $relevant_content['services'][] = $service;
                    break;
                }
            }
        }
        
        // Check case studies
        foreach ($this->case_studies as $case_key => $case_study) {
            foreach ($case_study['keywords'] as $keyword) {
                if (strpos($user_message_lower, strtolower($keyword)) !== false) {
                    $relevant_content['case_studies'][] = $case_study;
                    break;
                }
            }
        }
        
        // Check FAQs
        foreach ($this->faqs as $faq_key => $faq) {
            if (strpos($user_message_lower, 'how long') !== false && $faq_key === 'how_long_results') {
                $relevant_content['faqs'][] = $faq;
            }
            if (strpos($user_message_lower, 'organic') !== false && $faq_key === 'what_is_organic_marketing') {
                $relevant_content['faqs'][] = $faq;
            }
            if ((strpos($user_message_lower, 'paid') !== false || strpos($user_message_lower, 'advertising') !== false) && $faq_key === 'organic_vs_paid') {
                $relevant_content['faqs'][] = $faq;
            }
        }
        
        return $relevant_content;
    }
    
    // Generate context for Claude based on conversation stage and content
    public function generate_claude_context($user_message, $conversation_stage, $lead_data) {
        $relevant_content = $this->find_relevant_content($user_message, $conversation_stage, $lead_data);
        
        $context = "You are a friendly lead qualification assistant for Proud Brands, a family-run digital agency in Aylesbury, Buckinghamshire, established in 2014.\n\n";
        
        // Add company philosophy
        $context .= "COMPANY PHILOSOPHY: " . $this->company_info['philosophy'] . "\n";
        $context .= "APPROACH: " . $this->company_info['approach'] . "\n\n";
        
        // Add relevant services
        if (!empty($relevant_content['services'])) {
            $context .= "RELEVANT SERVICES:\n";
            foreach ($relevant_content['services'] as $service) {
                $context .= "- {$service['name']}: {$service['description']}\n";
                if (!empty($service['benefits'])) {
                    foreach ($service['benefits'] as $benefit) {
                        $context .= "  • {$benefit}\n";
                    }
                }
            }
            $context .= "\n";
        }
        
        // Add relevant case studies
        if (!empty($relevant_content['case_studies'])) {
            $context .= "RELEVANT CASE STUDIES:\n";
            foreach ($relevant_content['case_studies'] as $case_study) {
                $context .= "- {$case_study['client']}: {$case_study['challenge']} → {$case_study['solution']} → {$case_study['results']}\n";
            }
            $context .= "\n";
        }
        
        // Add conversation guidelines
        $context .= "CONVERSATION GUIDELINES:\n";
        $context .= "- Keep responses under 50 words unless specifically asked for details\n";
        $context .= "- Use the gardening metaphors naturally (we're 'digital gardeners')\n";
        $context .= "- Focus on business outcomes and genuine help\n";
        $context .= "- Ask ONE thoughtful follow-up question\n";
        $context .= "- Assess their knowledge level without using jargon\n";
        $context .= "- Current conversation stage: {$conversation_stage}\n\n";
        
        return $context;
    }
}

// Updated chat handler function
function handle_chatbot_request($request) {
    $params = $request->get_json_params();
    $knowledge_base = new ProudBrandsKnowledgeBase();
    
    // Generate intelligent context
    $context = $knowledge_base->generate_claude_context(
        $params['message'],
        $params['stage'],
        $params['leadData']
    );
    
    // Call Claude with enriched context
    $claude_response = call_claude_api_with_context($params, $context);
    
    return rest_ensure_response(array(
        'response' => $claude_response,
        'status' => 'success'
    ));
}

function call_claude_api_with_context($params, $context) {
    $api_key = defined('CLAUDE_API_KEY') ? CLAUDE_API_KEY : '';
    
    if (empty($api_key)) {
        error_log('Claude API key not configured');
        return "I'm temporarily unavailable. Please try again in a moment.";
    }
    
    $body = json_encode(array(
        'model' => 'claude-3-sonnet-20240229',
        'max_tokens' => 150,
        'messages' => array(
            array(
                'role' => 'system',
                'content' => $context
            ),
            array(
                'role' => 'user', 
                'content' => $params['message']
            )
        )
    ));
    
    $response = wp_remote_post('https://api.anthropic.com/v1/messages', array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'x-api-key' => $api_key,
            'anthropic-version' => '2023-06-01'
        ),
        'body' => $body,
        'timeout' => 30
    ));
    
    if (is_wp_error($response)) {
        error_log('Claude API Error: ' . $response->get_error_message());
        return "I'm having a quick technical moment. Could you try that again?";
    }
    
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    if (isset($data['error'])) {
        error_log('Claude API Error: ' . json_encode($data['error']));
        return "Something went wrong on my end. Mind trying that again?";
    }
    
    return $data['content'][0]['text'] ?? "I didn't quite catch that. Could you rephrase?";
}
?>