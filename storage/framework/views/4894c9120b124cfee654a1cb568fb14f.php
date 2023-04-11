<aside class="side-bar">
    <span class="logo"><a href="/" ><span class="blue" >Time</span>2Share</a></span>
    <ul class="link-list">
        <h1>Links</h1>
        <li><a href="/products">Alle producten</a></li>
        <li><a href="/products/borrowed">Uitgeleende producten</a></li>
        <li><a href="/products/borrowing">Aan het lenen</a></li>
        <form action="/logout" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Logout</button>
        </form>

    </ul>
</aside> <?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/components/sidebar.blade.php ENDPATH**/ ?>