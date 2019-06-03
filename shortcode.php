<?php
//Generate shortcode admin page
function upg_shortcode()
{
    ?>
    <div class="wrap">

    <?php
		do_action( "upg_admin_top_menu");
		?>

    <h2>Shortcodes included with UPG</h2>
    <h4>UPG comes with several shortcodes that can be used to insert content inside posts and pages.</h4>

   <script>
    jQuery(document).ready(function($){
        $("#tabs").tabs();
    });
  </script>
  	<div id="tabs">
	<ul>
		
     <li><a href="#tab-1"><?php echo __("[upg-list]","wp-upg");?></a></li>
     <li><a href="#tab-2"><?php echo __("[upg-attach]","wp-upg");?></a></li>
     <li><a href="#tab-3"><?php echo __("[upg-post]","wp-upg");?></a></li>
     <li><a href="#tab-4"><?php echo __("[upg-form]","wp-upg");?></a></li>
	 <li><a href="#tab-5"><?php echo __("[upg-edit]","wp-upg");?></a></li>
     <li><a href="#tab-6"><?php echo __("[upg-pick]","wp-upg");?></a></li>
     <li><a href="#tab-7"><?php echo __("[upg-search]","wp-upg");?></a></li>
	       
    </ul>

	 <div id="tab-1">
        <h3>Display Primary Gallery</h3>
        <h4> [upg-list]</h4>
        This will generate gallery of submitted images/video/post. If <code>[upg-list]</code> shortcode is used without parameters,
        the default settings applied at 'UPG settings'. 
        But we can overwrite the settings with parameters into it. 
        <hr>
        <b>Notes:</b>
        <ol>
        <li>Do not use it in post page & widgets, if navigation required.</li>
        <li>You can use it in front page, but page shouldn't be selected as 'main UPG page' in settings.</li>
        <li>Parameters are case sensitive. Write all in lowercase.</li>
        </ol>
   
        <h4>Available Attributes:</h4>
        The following attributes are available to use in conjunction with the [upg-list] shortcode.
        They have been split into sections for primary function for ease of navigation, with examples below.
        <br>

        <div class="update-nag">
                <ul style="list-style-type:circle;">
                    <li> <code>album</code> = "Slug name of album" -  Displays gallery of specific UPG-Post album/category.</li>
                    <li> <code>perpage</code> = "No. of total post" -  Number of total post to be displayed per page.</li>
                    <li> <code>perrow</code> = "No. of Rows/column" -  Number of post to be displayed per row/horizontally.</li>
                    <li> <code>page</code> = "on | off" -  Display page navigation if value is on. Only visible if <code>perpage</code> value is less then the total number of post.</li>
                    <li>
                    <code>orderby</code> = "date | title | modified | ID | rand" -  5 different ways the gallery can be sorted.
                        <ul style="list-style-type:disc;margin-left: 50px;">
                        <li>date - Order by date. ('post_date' is also accepted.)</li>
                        <li>title - List by post title.</li>
                        <li>modified - Order by last modified date. ('post_modified' is also accepted.)</li>
                        <li>ID - Order by post id. Note the capitalization.</li>
                        <li>rand - List random post.</li>
                        </ul>
                    </li>
                    <li> <code>layout</code> = "Gallery Layout name" -  Each gallery can have their own type of layout. There are several default layouts available (i.e. list, flat , personal, etc.).</li>
                    <li> <code>popup</code> = "on | off" -  The post when clicked will have a popup box instead going to another page. (Another page we call it as 'preview page')</li>
                    <li> <code>button</code> = "on | off" -  The parameter is used to show a submission button at the gallery page. The submission button selected at UPG settings is displayed. If the shortcode parameter value is off , the buttons are not displayed even if it is set to show at UPG settings.</li>
                    <li> <code>author</code> = "on | off" -  The parameter is used to show a author profile avatar at the top of gallery page.</li>
                    <li> <code>user</code> = "user's username" -  The parameter is used to show a post gallery submitted by a particular username.<br>
                                                                show_mine user is reserved username of UPG.</li>
                    <li> <code>login</code> = "true" -  Forces only logged in user can view the gallery.</li>
                
                </ul>
        <h4>Scenario 1 – I want to display gallery where each column 3, total number of record each page is 6 from album 'fruits'</h4>
        <code>[upg-list perrow="3" perpage="6" album="fruits"] </code>

        <h4>Scenario 2 – I want only logged in member to view gallery</h4>
        <code>[upg-list login="true"]</code>

        <h4>Scenario 3 – I want to show gallery of current logged in user</h4>
        <code>[upg-list user="show_mine"]</code>

        <h4>Scenario 4 – I want to show latest uploaded gallery in 'slide' layout with popup enabled.</h4>
        <code>[upg-list layout="slide" popup="on" orderby="modified"]</code>
        </div>



     </div>


     <div id="tab-2">
            <h3>Attached Gallery</h3>
                <h4> [upg-attach]</h4>
                This will display gallery with form to the specific page/post where this shortcode is inserted.<br>
                Picture/Video submitted at this page will not be visible at other post. 
            <hr>
            <b>Notes:</b>
            <ol>
            <li>This shortcode will use ajax. It cannot be altered. </li>
            <li>'Load More' Button is available only to this. No page navigation is required.</li>
            <li>Gallery layout is based on the UPG settings. It cannot be altered by shortcode.</li>
            <li>If you want to display all gallery <code>[upg-attach]</code> in one place, use <code>[upg-list]</code> shortcode. </li>
            <li>Parameters are case sensitive. Write all in lowercase.</li>
            </ol>
            <h4>Available Attributes:</h4>
        The following attributes are available to use in conjunction with the <code>[upg-attach]</code> shortcode.
        They have been split into sections for primary function for ease of navigation, with examples below.
        <br>

            <div class="update-nag">
            <ul>
                <li> <code>type="image"</code> -  image is default type &  it will display submission form for image only.</li>
                <li> <code>type="youtube"</code> - It will  display form to submit youtube & vimeo URL.</li>
                <li> <code>layout</code> = "Form Layout name" -  Here layout is only used for submission form. <br>It will not have any affect on gallery layout. <br>You can find available layouts at 'layout editor'</li>
                <li> <code>preview</code> = "Preview Layout name " -  When form is submitted, it will assign a 'preview layout' to the post. <br>If not specified it will use default UPG settings. <br> If lightbox is enabled, the preview page is not required. <br>You can find available layouts at 'layout editor' </li>
            </ul>
            </div>
     </div>





     <div id="tab-3">
            <h3>Built in Submission Form</h3>
                <h4> [upg-post]</h4>
                The front End submission form for image/video url is created as soon as you activate UPG plugin.
                You can make your own submission form by inserting the shortcode below into content area of a page or post.
            <hr>
            <b>Notes:</b>
            <ol>
                <li>If only <code>[upg-post]</code> is used, it will use UPG settings.</li>
                <li>Some form are ready to use, and it continuously compatible with latest version. </li>
                <li>You can create your own form using 'layout editor'. The concept used is, editing the existing form to generate own 'personal layout'.</li>
                <li>If you created your own form, use form layout as 'personal'.</li>
                <li>Even after update, the created form won't be lost. It is copied at wordpress default upload folder. </li>
                <li>You can add more custom fields, which needs to get enabled at 'UPG Advance Settings'.</li>
            </ol>
            <h4>Available Attributes:</h4>
        The following attributes are available to use in conjunction with the <code>[upg-post]</code> shortcode.
        They have been split into sections for primary function for ease of navigation, with examples below.
        <br>

            <div class="update-nag">
            <ul>
                <li> <code>type="image"</code> -  It will display submission form for image only.</li>
                <li> <code>type="youtube"</code> -  It will display submission form for YouTube & Vimeo URL only.</li>
                <li> <code>layout</code> = "Form Layout Name" -  It will change the design/layout for the submission form. Use <code>layout="personal"</code> if you have created your own form layout.</li>
                <li> <code>preview</code> = "Preview Layout Name" - When image/post/video are clicked, a page is opened which is called 'preview layout'. <br>This layout is not activated if popup is enabled in <code>[upg-list] or [upg-attach]</code>.</li>
                <li> <code>form_name</code> = "any_form_name" -  Sometime when there are multiple form on same page, the form may not work properly. <br>So it's better to differentiate form with their name.</li>
                <li> <code>ajax</code> = "true | false" -  If true , it will convert current form into ajax form. No page is changed after form submitted.</li>
                <li> <code>login</code> = "true | false" - If true, only logged in user can view the submission form.</li>
            
            </ul>
            </div>
     </div>


     <div id="tab-4">
            <h3>Create form with help of Shortcodes</h3>
                <h4> [upg-form] (Under Development)</h4>
                You can generate your own form with the help of shortcode. 
                <code>[upg-post]</code> will use ready layouts whereas with this you can make your own.
                It is best suited for them, who don't have good php knowledge. 
                If you are good at php/css, I recommend you to use <code>[upg-post]</code> with 'personal layout'.
                <br><br>
                <b>Notes:</b>
                <ol>
                    <li class="page_item">It is still under development, and change in shortcode may happen.</li>
                    <li class="page_item">This form cannot be used as layout in other shortcode parameters. But it can be used in UPG form settings.</li>
                    <li>This form is generated with the help of two shortcodes <code>[upg-form] & [upg-form-tag]</code></li>
                    <li><code>[upg-form-tag]</code> should always be between <code>[upg-form] .... [/upg-form]</code></li>
                    <li>This form is only for submit, it cannot be used for edit/modify form. </li>
                    <li>Form will always use Ajax. It will not redirect the page.</li>
            </ol>
            <h4>Scenario 1 – Display form only with title field.</h4>
            
            <code>
            [upg-form class="pure-form" title="Upload your media" name="my_form"] 
            <br>
            [upg-form-tag type="post_title" title="Main Title" value="" placeholder="main title" required="true"]
            <br>
            [upg-form-tag type="submit" name="submit" value="Submit Now"]
            <br>
            [/upg-form]
            
            </code>
     </div>


     <div id="tab-5">
            <h3>Modify/Edit Submitted Post</h3>
                <h4> [upg-edit]</h4>
                If you want, a regular visitor and wanted to edit the submitted post then use shortcode <code> [upg-edit]</code> on a page.<br>
                Don't forget to select that edit page in your UPG settings.
            <hr>
            <b>Notes:</b>
                <ol>
                <li>It is only accessible to loggedin users.</li>
                <li>If in settings, edit button is enabled, user can edit the post.</li>
                <li>Ajax modification is not available on this form.</li>
                <li>You can have submission form different then edit form. This way you can add/remove some fields.</li>
                </ol>
       
                 <h4>Scenario 1 – Display 'Edit Form' with 'simple form layout'</h4>
             <code>[upg-edit layout="simple"]</code>
     </div>


     <div id="tab-6">

            <h3>Pick a Post</h3>
                <h4> [upg-pick]</h4>
                With the help of this shortcode, you can select any one UPG post and display it anywhere you like sidebar.
                <b>Notes:</b>
                <ol>
                <li>More attributes will come soon. It is still under development.</li>
                </ol>

                <h4>Available Attributes:</h4>
                <div class="update-nag">
                    <ul>
                        <li> <code>id</code> =  "UPG's Post ID" -  Numeric post id of the UPG POST. This you can get from UPG list page looking at it's URL. POST={ID}</li>
                        <li><code>notice</code> = "Any text" - You can keep any extra text with image. Eg. Sale, Featured</li>
                        <li><code>layout</code>= "Gallery Layout Name" -It's a same as on <code>[upg-list]</code> layout.</li>
                        <li><code>popup</code>= "on | off" - If on, it will popup the post ignoring the 'preview layout'</li>
                    </ul>
                </div>
            <hr>
            <h4>Scenario 1 – Display UPG POST whose id is '44' and display as 'SALE'</h4>
                <code>[upg-pick id='44' notice='SALE']</code>

            </div>


     <div id="tab-7">

            <h3>Search UPG Post</h3>
                <h4> [upg-search]</h4>
                With this shortcode, user can search through the gallery. <br><br>
                <b>Notes:</b>
                <ol>
                <li>It is available only to UPG-PRO version.</li>
                <li>It will not work for <code>[upg-attach]</code> page.</li>
                <li>UPG main page is used for search which is indicated at setting page.<br>
                All parameters (layout, popup, etc.) applied on main page <code>[up-list]</code>is used. </li>
                <li>Redesign search bar is not available. It is wrapped between div class "upg_search_bar".<br>
                Using "pure-form" class in form tag.</li>
                </ol>

                <hr>
            <h4>Scenario 1 – Display search bar above gallery</h4>
            Just insert a shortcode before gallery shortcode.<br>
            <div class="update-nag"><code>[upg-search]<br>[upg-list]</code></div>
            </div>

    </div>
    <?php
}
?>