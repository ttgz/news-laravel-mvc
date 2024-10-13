<script src="{{ asset('/js/jquery.min.js') }}" defer></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/js/bootstrap.min.js') }}" defer></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('/js/metisMenu.min.js') }}" defer></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset('/js/raphael.min.js') }}" defer></script>
<script src="{{ asset('/js/morris.min.js') }}" defer></script>
<script src="{{ asset('/js/morris-data.js') }}" defer></script>

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
    
    const url = new URL(window.location.href).pathname;
    const part = url.split('/');
    console.log(url);
    console.log(part);
    if(url==='/admin/category/edit/'+part[4])
    {
        const form = document.getElementById('formCategory');
        form.action = "/admin/category/edit";
 
    }
    if(url==='/admin/subcribe/edit/'+part[4])
    {
        const form = document.getElementById('formSubcribe');
        form.action = "/admin/subcribe/edit";
    }
    if(url==='/admin/advertisement/edit/'+part[4])
    {
        const form = document.getElementById('formAd');
        form.action = "/admin/advertisement/edit";
    }
    if(url==='/admin/article/edit/'+part[4])
    {
        const form = document.getElementById('formArticle');
        form.action = "/admin/article/edit";
    }
    if(url==='/admin/news-video/edit/'+part[4])
    {
        const form = document.getElementById('formNewsVideo');
        form.action = "/admin/news-video/edit";
    }
    
</script>

<script>
    window.onload = ()=>{
        const updatedAt = document.getElementById('updated_at');
        updatedAt.value= new Date().toISOString().slice(0, 10);
        console.log(updatedAt);
    }
       
 
</script>
</body>
</html>
