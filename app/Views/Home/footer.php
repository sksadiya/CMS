<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 - <a href="<?= base_url('/')?>">CMS</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.like-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                var postId = this.getAttribute('data-post-id');
                likePost(postId);
            });
        });

        function likePost(postId) {
            var likeIcon = document.querySelector('.like-btn[data-post-id="' + postId + '"] i');
            likeIcon.classList.toggle('fas');
            likeIcon.classList.toggle('far');

            fetch('<?= base_url('like/post') ?>/' + postId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ postId: postId }),
            })
                .then(response => response.json())
                .then(data => {
                    var likeCountElement = document.querySelector('.like-count[data-post-id="' + postId + '"]');
                    if (likeCountElement) {
                        likeCountElement.textContent = data.likes + ' Likes';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });

</script>

<script>
                var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?81453';
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url;
                var options = {
                "enabled":true,
                "chatButtonSetting":{
                    "backgroundColor":"#00e785",
                    "ctaText":"Chat with us",
                    "borderRadius":"25",
                    "marginLeft": "0",
                    "marginRight": "20",
                    "marginBottom": "20",
                    "ctaIconWATI":false,
                    "position":"right"
                },
                "brandSetting":{
                    "brandName":"cms",
                    "brandSubTitle":"undefined",
                    "brandImg":"https://www.wati.io/wp-content/uploads/2023/04/Wati-logo.svg",
                    "welcomeText":"Hi there!\nHow can I help you?",
                    "messageText":"{{page_link}}Hello, %0A I have a question about https://localhost/cms",
                    "backgroundColor":"#00e785",
                    "ctaText":"Chat with us",
                    "borderRadius":"25",
                    "autoShow":false,
					

                    "phoneNumber":"8830641063"
                }
                };
                s.onload = function() {
                    CreateWhatsappChatWidget(options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            </script>

	<!-- jquery -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="<?= base_url('public/assets/js/jquery-1.11.3.min.js') ?>"></script>
	<!-- bootstrap -->
	<script src="<?= base_url('public/assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!-- count down -->
	<script src="<?= base_url('public/assets/js/jquery.countdown.js') ?>"></script>
	<!-- isotope -->
	<script src="<?= base_url('public/assets/js/jquery.isotope-3.0.6.min.js') ?>"></script>
	<!-- waypoints -->
	<script src="<?= base_url('public/assets/js/waypoints.js') ?>"></script>
	<!-- owl carousel -->
	<script src="<?= base_url('public/assets/js/owl.carousel.min.js') ?>"></script>
	<!-- magnific popup -->
	<script src="<?= base_url('public/assets/js/jquery.magnific-popup.min.js') ?>"></script>
	<!-- mean menu -->
	<script src="<?= base_url('public/assets/js/jquery.meanmenu.min.js') ?>"></script>
	<!-- sticker js -->
	<script src="<?= base_url('public/assets/js/sticker.js') ?>"></script>
	<!-- main js -->
	<script src="<?= base_url('public/assets/js/main.js') ?>"></script>

</body>
</html>