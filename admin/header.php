<?php include("../config.php"); ?>
<html>
<head><title>Dashboard</title>
<link rel= "stylesheet" type= "text/css" href= "../style-admin.css" />
<script type= "text/javascript" src= "../ckeditor/ckeditor.js"></script>
<script type= "text/javascript">
function confirmDelete()
{
	return confirm("Do you sure want to Delete this data?");
}
 </script>
 
  <!-- Add jQuery library -->
	<script type="text/javascript" src="../fancybox/lib/jquery-1.10.2.min.js"></script>

<!-- Add fancyBox -->
<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../fancybox/source/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/source/jquery.fancybox.css" />
	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>

</head>
</body>
<div id= "wrapper">
<div id="header">
   <h1> Admin Panel Dashboard</h1>
   </div>
   <div id= "coniainer">
   <div id= "sidebar">
   <h2>Page Options</h2>
   <ul>
     
     <li><a href= "index.php">Home</a></li>
	 <li><a href= "change-footer.php">Change Footer Text</a></li>
	 <li><a href= "change-password.php">Change Password</a></li>
	 <li><a href= "logout.php">Logout</a></li>
	 <li><a href= "../index.php">My blog site</a></li>
	</ul>
	<h2>Blog options</h2>
	<ul>
	  <li><a href= "post-add.php">Add post</a></li>
	  <li><a href= "post-view.php">View Post</a></li>
	  <li><a href= "manage-category.php">Manage Category</a></li>
	  <li><a href= "manage-tag.php">manage Tages</a></li>
	  </ul>
	  
	  <h2>Comment Section</h2>
	<ul>
	  <li><a href= "comment-approve.php">View comments</a></li>
	   
	  </ul>
	  </div>
    <div id= "content">