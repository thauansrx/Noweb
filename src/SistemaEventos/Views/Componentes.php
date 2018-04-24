<?php

    namespace SistemaEventos\Views;

    class Componentes {
        
        /* Classe para armazenar itens em comum do frontend */
        
        public function metas() { //Tags metas
            return '<meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        }
        
        
        public function bibliotecas() { 
            return '<link rel="stylesheet" type="text/css" href="../../../static/css/kickstart.min.css">
                    <link rel="stylesheet" type="text/css" href="../../../static/css/style.css">
                    <script src="../../../static/js/kickstart.min.js"></script>
                    <script src="../../../static/js/jquery.min.js"></script>';
        }
        
        
        public function navbar() {
            return '<div class="navbar">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="login.php">Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>';
        }
        
        
    }
?>