			<!-- FOOTER -->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2022 All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- FOOTER END -->
			</div>

			<!-- BACK-TO-TOP -->
			<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

			@yield('script')


			<!-- JQUERY JS -->			
			<script src="{{asset('assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('assets/js/jquery.validate.min.js')}}" defer></script>
			<script src="{{asset('assets/js/custom-form-validation.js')}}"></script>

			<!-- BOOTSTRAP JS -->
			<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
			<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

			<!-- SPARKLINE JS-->
			<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

			<!-- INTERNAL SELECT2 JS -->
			<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

			<!-- Form element -->
			<script src="{{asset('assets/js/form-elements.js')}}"></script>

			<!-- SIDE-MENU JS-->
			<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

			<!-- SIDEBAR JS -->
			<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

			<!-- Perfect SCROLLBAR JS-->
			<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
			<script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>

			<!-- DATA TABLE JS-->
			<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
			<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
			<script src="{{asset('assets/js/table-data.js')}}"></script>

			<!-- CUSTOM JS -->
			<script src="{{asset('assets/js/custom.js')}}"></script>

			<script>
				$(document).on('select2:open', () => {
					let allFound = document.querySelectorAll('.select2-container--open .select2-search__field');
					allFound[allFound.length - 1].focus();
				});

				$('.select2').select2();
			</script>
			</body>

			</html>