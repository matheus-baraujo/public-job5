        <!-- Admin Login Form -->
        <div class="row form-contact-alter" >
            

            <div class="col-12" style="padding: 5% 25% 15% 25%; text-align: center;">

                <p class="titulo" style="font-size: 4vw; margin-bottom: 0; padding-bottom: 5%; color:white;">Administração</p>

                <form id="login-form" action="login.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="formulario" id="name" name="name" placeholder="login" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="formulario" id="password" name="password" placeholder="password" required>
                    </div>
                    <input type="submit" value="Login" class="btn" style="color:black; font-size: 1.8vw;">
                </form>
                
                <?php 
                    if (isset($_GET['status']) and $_GET['status'] == 'erro') {
                        echo '<p style="color: white; margin-left: auto; margin-right:auto;">Falha ao efetuar login, usuário ou senha incorreta.</p>';
                    }
                ?>

            </div>
            
        </div>