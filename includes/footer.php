    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && basename($_SERVER['PHP_SELF']) !== 'login.php'): ?>
    </div> <!-- end main-content -->
    <?php else: ?>
    </div> <!-- end login-wrapper -->
    <?php endif; ?>
</body>
</html>
