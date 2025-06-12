<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">RelawanConnect</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                     <?php if (isset($_SESSION['login'])) : ?>
                        <!-- JIKA SUDAH LOGIN -->
                         <div class="nav-item me-3">
                        <a href="upload.php" class="btn btn-outline-light">Uploud Donasi</a>
                     </div>
                        <a href="admin/logout_admin.php" class="btn btn-outline-light">logout</a>    
                
                    <?php else : ?>
                        <!-- JIKA BELUM LOGIN -->
                        
                        <a href="login.php" class="btn btn-outline-light">login</a>
                    <?php endif; ?>
                </ul>
            </div>
        </div>  
    </nav>