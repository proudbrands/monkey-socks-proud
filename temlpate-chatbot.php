<?php
/*
Template Name: Chatbot Fullscreen
*/
get_header();
?>

<style>
  .chatbot-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh; /* full height */
    width: 100%;
    background: #f8fafc; /* light background so bot stands out */
  }
  .chatbot-container {
    max-width: 480px;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .chatbot-container #pb-heather {
    position: static; /* reset fixed positioning from plugin */
    width: 100%;
  }
  .chatbot-container .pbh-panel {
    position: relative !important;
    bottom: auto !important;
    right: auto !important;
    width: 100% !important;
    max-height: 90vh !important;
  }
</style>

<div class="chatbot-wrapper">
  <div class="chatbot-container">
    <?php echo do_shortcode('[heather_chat]'); ?>
  </div>
</div>

<?php get_footer(); ?>
