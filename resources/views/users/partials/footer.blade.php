@yield('trending')

<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="{{ asset('/images/white_logo.png') }}" alt="img"
                    class="footer_logo" /></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> About</div>
                <div class="footer_sub_about pb-3" id="about"> Lorem Ipsum is simply dummy text of the printing and
                    typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                        </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                        </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Category</div>
                <ul class="footer_menu" id="footer_menu">

                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative" id="most-view">



            </div>
            <div class="col-12 col-md-12 col-lg-4 " id="last-modified-posts">


            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">

                <div class="input-group">
                    @csrf
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i
                            class="fa fa-envelope"></i></span>
                    <input type="text" name="email" id="email" class="form-control fh5co_footer_text_box"
                        placeholder="Enter your email..." aria-describedby="basic-addon1" value="">
                    <button type="submit" href="#" class="input-group-addon fh5co_footer_subcribe"
                        id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</button>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2018, All rights reserved. Design by <a
                    href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>. </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                <a href="#" class="footer_last_part_menu">Home</a>
                <a href="Contact_us.html" class="footer_last_part_menu">About</a>
                <a href="Contact_us.html" class="footer_last_part_menu">Contact</a>
                <a href="blog.html" class="footer_last_part_menu">Latest News</a>
            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
    integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous">
</script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
    integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
</script>
<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('js/main.js') }}"></script>
<script>
    const js = {{ Js::from(session('success')) }}
    if (js !== null)
        window.alert(js);
</script>
<script>
    function loadFooter() {
        fetch('/api/contact')
            .then((data) => {
                return data.text();
            })
            .then((data) => {
                const contact = JSON.parse(data);
                document.getElementById('about').textContent = contact.about;
            });
        fetch('/api/category')
            .then((data) => {
                return data.text();
            })
            .then((data) => {
                data = JSON.parse(data);
                let footerMenu = document.getElementById('footer_menu');
                let categories = data.map((category) =>
                    `<li><a href="/search?category=${category.id}" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; ${category.name}</a></li>`
                );
                categories = categories.join('');
                footerMenu.innerHTML = categories;


            })
        fetch('/api/get-top-three-posts')
            .then(data => data.text())
            .then((data) => {
                data = JSON.parse(data);
                let dataHTML = data.map((post) => {
                    return `<div class="footer_makes_sub_font"> ${post.created_at}</div><a href="/detail/${post.slug}" class="footer_post pb-4"> ${post.title} </a>`;
                })
                document.getElementById('most-view').innerHTML = `<div class="footer_main_title py-3"> Most Viewed Posts</div> ${dataHTML.join('')}  <div class="footer_position_absolute"><img src="{{ asset('images/footer_sub_tipik.png') }}"
                        alt="img" class="width_footer_sub_img" /></div>`;

                let topTrending = document.getElementById('top-trending');
                topTrending.innerHTML = ` <div class="col-12 fh5co_mediya_center"><a href="/detail/${data[0].slug}" class="color_fff fh5co_mediya_setting"><i
                    class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp; ${data[0].created_at}</a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="/detail/${data[0].slug}" class="treding_btn">Trending</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a href="/detail/${data[0].slug}" class="color_fff fh5co_mediya_setting"> ${data[0].title}</a>
            </div>`;

            })
        fetch('/api/get-post-last-modify')
            .then(data => data.text())
            .then((data) => {
                data = JSON.parse(data);
                let dataHTML = data.map((post) => {
                    return `<a href="/detail/${post.slug}" class="footer_img_post_6"><img src="${post.image}" alt="img" /></a>`;
                })
                document.getElementById('last-modified-posts').innerHTML =
                    `<div class="footer_main_title py-3"> Last Modified Posts</div> ${dataHTML.join('')}`;

            })
    }
    loadFooter();
</script>
<script>
    const formSubcribe = document.getElementById('basic-addon12');
    formSubcribe.addEventListener('click', (e) => {
        const data = {
            email: document.getElementById('email').value,
            _token: '{{ csrf_token() }}'
        }
        fetch('/admin/subcribe', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(data => data.text())
            .then(data => {
                window.alert(JSON.stringify(data))
            })
    })
</script>
@yield('script')
</body>

</html>
