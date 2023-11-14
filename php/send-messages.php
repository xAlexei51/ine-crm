<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="styles/styles.css">        
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Envio de mensajes</title>
</head>
<body>
<?php

use Twilio\Rest\Client;
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seleccionados'])) {
    $seleccionados = $_POST['seleccionados'];

    foreach ($seleccionados as $phone) {
      //echo $phone;
    }    
    
} else {
  echo "<script>";
  echo "Swal.fire({
          title: '¡Ups!',
          text: 'Pararece que no has seleccionado usuarios!',
          icon: 'warning',
          confirmButtonText: '¡Entendido!'
      }).then((result) => {
          if (result.isConfirmed) {
          // Redirige a otra página después de cerrar el cuadro de diálogo
          window.location.href = '../militantesList.php';
          }
      });";
  echo "</script>";
}

require "navbar-folder.php";
?>
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
              <!-- Main content header -->               
              <!-- Start Content -->
              <div class="w-full p-6 bg-white rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Inicio / Envio de mensajes por WhatsApp</h5>
                </a>                                                                                  
                                      
                </div>     
              <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
            <h3 class="mt-6 text-xl"></h3>
            <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-md shadow-md">
                        <div class="py-12">
                          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                  <div class="p-6 bg-white border-b border-gray-200">
                                      <form method="POST" action="send-whatsapp.php">                                          
                                          <div class="mb-8">
                                              <label class="text-xl text-gray-600">Contenido del mensaje de WhatsApp <span class="text-red-500">*</span></label></br>
                                              <textarea name="content" rows="5" placeholder="Escribe tu mensaje aqui..." class=" min-h-unset mt-9 text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-800 focus:outline-none"></textarea>
                                          </div>
                                          <div class="flex p-1">                            
                                              <button role="submit" class="block w-full bg-slate-800 mt-4 py-2 rounded text-white font-semibold mb-2 px-4" required>Enviar</button>
                                          </div>
                                          <div>
                                          <?php 
                                            foreach($seleccionados as $phones):
                                          ?>
                                          <input type="hidden" name="seleccionados[]" value="<?php echo $phones; ?>">
                                          <?php 
                                          endforeach;
                                          ?>
                                          </div>
                                          
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>                                         
                    </div>
                  </div>
                </div>
             </div>
            </main>
            <!-- Main footer -->            
          </div>                        
              <!-- Settings Panel Content -->
            </div>
          </div>
        </div>                
    </div>
<script src="js/tagselector.js"></script>
<script src="js/multiselect.js" ></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>   
<script>
  const setup = () => {
    return {
      loading: true,
      isSidebarOpen: false,
      toggleSidbarMenu() {
        this.isSidebarOpen = !this.isSidebarOpen
      },
      isSettingsPanelOpen: false,
      isSearchBoxOpen: false,
    }
  }
</script>
</body>
</html>