<!DOCTYPE html>
<html lang="en">

<head>
<title>Support A Child | Support A Child</title>

    <meta charset="utf-8">
    <link rel="icon" href="https://www.supportachildusa.org/wp-content/uploads/2019/04/cropped-SAC-logo512sq-192x192.png" sizes="192x192" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Hrcinfotech" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ?>public/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/style.css">

    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    
<style>
    div#table_id_wrapper {
    overflow: scroll;
}.dt-search {
    float: inline-end;
}
    </style>
</head>

<body class="">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>




    <?php include('include/navbar.php'); ?>

    <?php include('include/sidebar.php'); ?>

    <?php $this->load->view($view); ?>
    <script>
        jQuery(document).ready(function ($) {
          $('#table_id').DataTable({
            dom: 'Bfrtip', // Position for buttons and table elements
            buttons: [
              'copyHtml5',  // Export button to copy the data to clipboard
              'excelHtml5', // Export button to download in Excel format
              'csvHtml5',   // Export button to download in CSV format
              'pdfHtml5'    // Export button to download in PDF format
            ],
            // Pagination with numbers (1, 2, 3...)
            pageLength: 10,  // Default number of rows to show per page
            lengthMenu: [  // Show entries dropdown options
              [5, 10, 25, 50, 100],  // How many rows per page options
              ['5 rows', '10 rows', '25 rows', '50 rows', '100 rows']  // Text displayed in the dropdown
            ]
          });
        });
        
      </script>
    <script src="<?= base_url() ?>public/assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/pcoded.min.js"></script>

 
</body>

</html>