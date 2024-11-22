
<script src="{{ asset('/js/jquery.min.js') }}" defer></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/js/bootstrap.min.js') }}" defer></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('/js/metisMenu.min.js') }}" defer></script>

 
 <!-- Flot Charts JavaScript -->


<!-- Custom Theme JavaScript -->
<script src="{{ asset('/js/startmin.js') }}" defer></script>
<script>
    if (document.getElementById('hien-an')) {
        const xoa = document.getElementById('hien-an');
        setTimeout(() => {
            xoa.remove();
        }, 3000);
    }
</script>







<script>
    
</script>
@yield('script')
@yield('script-ajax')
</body>

</html>
