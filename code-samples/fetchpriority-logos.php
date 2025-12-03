<?php
/**
 * Mandate: Performance & Speed
 * Task: Inject fetchpriority='high' into Static Block Output
 * Targets: Image Blocks containing IDs 403, 404, 405
 * Rationale: Bypasses Gutenberg static storage to force LCP optimization.
 */
function possible_force_fetchpriority_block( $block_content, $block ) {
    // 1. Target only Image Blocks to save processing power
    if ( 'core/image' === $block['blockName'] ) {
        
        // 2. Scan the rendered HTML for your specific Asset IDs
        // We check for the class string that WordPress automatically adds
        if ( strpos( $block_content, 'wp-image-403' ) !== false || 
             strpos( $block_content, 'wp-image-404' ) !== false || 
             strpos( $block_content, 'wp-image-405' ) !== false ) {
            
            // 3. Surgical Injection: Add fetchpriority="high"
            // We use str_replace to insert it securely after the opening <img tag
            $block_content = str_replace( '<img ', '<img fetchpriority="high" ', $block_content );
            
            // 4. Mandatory: Strip "loading='lazy'" if it exists to prevent conflict
            $block_content = str_replace( 'loading="lazy"', '', $block_content );
        }
    }
    return $block_content;
}
add_filter( 'render_block', 'possible_force_fetchpriority_block', 10, 2 );
