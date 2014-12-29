    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!--Metis Menu Plugin JavaScript--> 
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    
    <!--bootstrap datepicker-->
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })
    </script>

    <!--bootstrap datepicker-->
    <script src="js/jquery.maskedinput.js"></script>
    <script>
        jQuery(function($){
            $(".tgl-masked").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
            $(".npwp-masked").mask("99-999-999-9-999-999");
        });
    </script>

</body>

</html>