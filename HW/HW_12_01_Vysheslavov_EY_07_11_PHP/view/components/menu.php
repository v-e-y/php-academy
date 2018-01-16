<!-- menu -->
<ul class="nav justify-content-center" role="navigation">
    <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
    <?php if (isset($_SESSION['userName'])): ?>
    <li class="nav-item"><a class="nav-link" href="/hello">Hello</a></li>
    <?php endif; ?>
    <li class="nav-item"><a class="nav-link" href="/push">Push</a></li>
    <li class="nav-item"><a class="nav-link" href="bonus">Bonus</a></li>
</ul>