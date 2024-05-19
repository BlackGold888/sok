<nav>
    <ul class="nav-list">
        <li class="list-item">
            <a href="/">Dashboard</a>
        </li>
    </ul>

    <div class="nav-logout">
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="/logout">Logout</a>
        <?php else : ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </div>
</nav>