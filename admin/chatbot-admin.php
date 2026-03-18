<?php
// ProudBrands Chatbot Admin Panel
// File: admin/chatbot-admin.php

function proudbrands_chatbot_admin_menu() {
    add_menu_page(
        'ProudBrands Chatbot',
        'Chatbot',
        'manage_options',
        'proudbrands-chatbot',
        'proudbrands_chatbot_admin_page',
        'dashicons-format-chat',
        30
    );
}
add_action('admin_menu', 'proudbrands_chatbot_admin_menu');

function proudbrands_chatbot_admin_page() {
    // Handle form submissions
    if (isset($_POST['refresh_content'])) {
        $extractor = new ProudBrandsContentExtractor();
        $content = $extractor->extract_fresh_content();
        echo '<div class="notice notice-success"><p>Content refreshed successfully!</p></div>';
    }
    
    if (isset($_POST['test_api'])) {
        $test_result = test_claude_api();
        if ($test_result['success']) {
            echo '<div class="notice notice-success"><p>API connection successful!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>API Error: ' . $test_result['error'] . '</p></div>';
        }
    }
    
    // Get current content cache
    $cached_content = get_option('proudbrands_extracted_content', []);
    $last_refresh = get_option('proudbrands_content_last_refresh', 'Never');
    
    ?>
    <div class="wrap">
        <h1>ProudBrands Chatbot Dashboard</h1>
        
        <div class="card">
            <h2>API Status</h2>
            <form method="post">
                <p>Test your Claude API connection:</p>
                <?php submit_button('Test API Connection', 'secondary', 'test_api'); ?>
            </form>
        </div>
        
        <div class="card">
            <h2>Content Management</h2>
            <p><strong>Last Content Refresh:</strong> <?php echo esc_html($last_refresh); ?></p>
            <p><strong>Pages Cached:</strong> <?php echo count($cached_content); ?></p>
            
            <form method="post">
                <p>Refresh website content for the chatbot knowledge base:</p>
                <?php submit_button('Refresh Content Now', 'primary', 'refresh_content'); ?>
            </form>
            
            <?php if (!empty($cached_content)): ?>
                <h3>Current Content Cache</h3>
                <table class="widefat">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Headings</th>
                            <th>Paragraphs</th>
                            <th>Key Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cached_content as $page => $content): ?>
                            <tr>
                                <td><?php echo esc_html($page); ?></td>
                                <td><?php echo isset($content['headings']) ? count($content['headings']) : 0; ?></td>
                                <td><?php echo isset($content['paragraphs']) ? count($content['paragraphs']) : 0; ?></td>
                                <td><?php echo isset($content['key_points']) ? count($content['key_points']) : 0; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        
        <div class="card">
            <h2>Chatbot Test</h2>
            <p>Test your chatbot responses:</p>
            <div id="chatbot-test-area">
                <input type="text" id="test-message" placeholder="Type a test message..." style="width: 300px;">
                <button onclick="testChatbot()" class="button">Send Test</button>
                <div id="test-response" style="margin-top: 10px; padding: 10px; background: #f9f9f9; border-left: 3px solid #007cba;"></div>
            </div>
            
            <script>
            async function testChatbot() {
                const message = document.getElementById('test-message').value;
                const responseDiv = document.getElementById('test-response');
                
                if (!message.trim()) return;
                
                responseDiv.innerHTML = 'Testing...';
                
                try {
                    const response = await fetch('/wp-json/proudbrands/v1/chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            message: message,
                            history: '',
                            stage: 'initial',
                            leadData: {}
                        })
                    });
                    
                    const data = await response.json();
                    responseDiv.innerHTML = '<strong>Response:</strong> ' + data.response;
                } catch (error) {
                    responseDiv.innerHTML = '<strong>Error:</strong> ' + error.message;
                }
            }
            </script>
        </div>
        
        <div class="card">
            <h2>Conversation Analytics</h2>
            <p>Coming soon: View chatbot conversation analytics and lead capture data.</p>
        </div>
    </div>
    
    <style>
    .card {
        background: white;
        border: 1px solid #ccd0d4;
        border-radius: 4px;
        margin: 20px 0;
        padding: 20px;
    }
    .card h2 {
        margin-top: 0;
    }
    </style>
    <?php
}

function test_claude_api() {
    $api_key = defined('CLAUDE_API_KEY') ? CLAUDE_API_KEY : '';
    
    if (empty($api_key)) {
        return ['success' => false, 'error' => 'API key not configured'];
    }
    
    $body = json_encode(array(
        'model' => 'claude-3-sonnet-20240229',
        'max_tokens' => 50,
        'messages' => array(
            array(
                'role' => 'user',
                'content' => 'Test message - please respond with "API working correctly"'
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
        return ['success' => false, 'error' => $response->get_error_message()];
    }
    
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    if (isset($data['error'])) {
        return ['success' => false, 'error' => $data['error']['message']];
    }
    
    return ['success' => true, 'response' => $data['content'][0]['text'] ?? 'Unknown response'];
}

// Include admin panel in functions.php
require_once get_template_directory() . '/admin/chatbot-admin.php';
?>