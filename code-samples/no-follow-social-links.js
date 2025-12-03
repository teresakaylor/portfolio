<script>
document.addEventListener('DOMContentLoaded', function() {
    // Selectors for ALL Social Links:
    // 1. .is-style-default a (For the global footer buttons)
    // 2. .social-stack-full a (For the specific buttons on Link Page)
    var socialLinks = document.querySelectorAll('.is-style-default a, .social-stack-full a');

    socialLinks.forEach(function(link) {
        // Ensure the link points to an external site to avoid SEO conflicts
        if (link.hostname !== location.hostname) {
            // Add 'nofollow' to preserve Link Equity
            if (!link.rel.includes('nofollow')) {
                link.rel += ' nofollow';
            }
            // Add 'noopener noreferrer' for security
            if (!link.rel.includes('noopener')) {
                link.rel += ' noopener noreferrer';
            }
        }
    });
});
</script>
