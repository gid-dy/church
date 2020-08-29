//Online Crime Reporting and Information System
//              By
//      ABBEY DICKSON AKWETEY
//              AND
//         GILBERT ASAMOAH
//     MONDAY 6TH JANUARY,2020.




$(document).ready(function () {

       
    $(".missing_case").hide();
    //$(".special_case").hide();
    $(".how_well_do_you_know_the_culprit").hide();
    $(".just_enough").hide();
    $(".just_little").hide();
    $(".little").hide();
    
    //$(".all-missing-item").show();
    //$(".Item").hide();
    //$(".items-table").show();

    //$(".view_single_news").hide();

    $(".evidence_format").hide();
    $(".picture_format").hide();
    $(".video_format").hide();
    $(".audio_format").hide();
    $(".do_you_have_evidence").hide();
    $(".submit_info").hide();

    //Missing Case
    $(".missing_item").click(function () {
        $(".how_well_do_you_know_the_culprit").hide("slow", function () {
        });
        $(".just_enough").hide();
        $(".just_little").hide();
        $(".little").hide();
        $(".missing_case").show("slow", function () {

        });
        $(".do_you_have_evidence").show("slow", function () {

        });
    });

    //Special Case
    $(".special_item").click(function () {
        $(".missing_case").hide("slow", function () {

        });
        $(".how_well_do_you_know_the_culprit").show("slow", function () {

        });
    });

    //Enough and valid - knowledge on culprit
    $(".enough").click(function () {
        $(".just_little").hide("slow", function () {

        });
        $(".little").hide("slow", function () {

        });
        $(".just_enough").show("slow", function () {

        });
        $(".do_you_have_evidence").show("slow", function () {

        });
    });

    //Just little and valid - knowledge on culprit
    $(".little_valid").click(function () {
        $(".just_enough").hide("slow", function () {

        });
        $(".little").hide("slow", function () {

        });
        $(".just_little").show("slow", function () {

        });
        $(".do_you_have_evidence").show("slow", function () {

        });
    });

    //Just little and not too sure - knowledge on culprit
    $(".little_not_sure").click(function () {
        $(".just_enough").hide("slow", function () {

        });
        $(".just_little").hide("slow", function () {

        });
        $(".little").show("slow", function () {

        });
        $(".do_you_have_evidence").show("slow", function () {

        });
    });


    //No - don't show evidence formate
    $(".no").click(function () {
        $(".evidence_format").hide("slow", function () {

        });
        $(".submit_info").show("slow", function () {

        });
    });


    //Yes - to show evidence formate
    $(".yes").click(function () {
        $(".evidence_format").show("slow", function () {

        });

        $(".submit_info").show("slow", function () {

        });
    });

    //Evidence[Picture, Video, Voice Note] clickable Options
    
    // ----> Picture clickable condition
    $('input[type="checkbox"]').click(function(){
        
        if ($(".picture").is(":checked")){
            $(".picture_format").show("slow");
        } else if ($(".picture").is(":not(:checked)")) {
            $(".picture_format").hide("slow");
        }
    });

    // ----> video clickable condition
    $('input[type="checkbox"]').click(function(){
        if ($(".video").is(":checked")){
            $(".video_format").show("slow");
        } else if ($(".video").is(":not(:checked)")) {
            $(".video_format").hide("slow");
        }
    });

    // ----> Voice note clickable condition
    $('input[type="checkbox"]').click(function(){
        if ($(".audio").is(":checked")){
            $(".audio_format").show("slow");
        } else if ($(".audio").is(":not(:checked)")) {
            $(".audio_format").hide("slow");
        }
    });

    //------>Missing item working space
    $(".view-all-missing").click(function () {
        $(".all-missing-item").hide("slow", function () {});
        $(".Item").hide("slow", function () {});
        $(".items-table").show("slow", function () { });
    });

    $(".report-item").click(function () {
        $(".display_all_post").hide("slow", function () {}); 
    });

    $(".view").click(function (e) {
        let data = $(this).data('object');
        $("#image").attr('src', 'uploads/Missing_Picture/'+data.Picture_Dir);
        $("#title").text(data.Title);
        $("#content").text(data.Missing_Content);
        $("#username").text(data.Username);
        $("#contact").text(data.Contact);
        $(".item_edit").attr('href', 'include/missing_item_confi.php?edit='+data.Missing_ItemId);
        $(".item_delete").attr('href', 'include/missing_item_confi.php?delete='+data.Missing_ItemId);

        $("#edite_title").attr('value', data.Title);
        $("#edit_content").attr('placeholder', data.Missing_Content);
        //$("#edit_picture_dir").attr('value', data.Missing_Content);
        $("#edit_contact").attr('value',data.Contact);
        $("#edit_date").attr('value', data.Date);
        $("#edit_time").attr('value', data.Time);

        $(".Item").show("slow", function () {});
        $(".items-table").hide("slow", function () {});
    });

    $(".item_edit").click(function (e) {
        e.preventDefault();
        console.log("hii");
    });

    //------News Working Space
    $(".view_all_post").click(function () {
        $(".display_all_post").hide("slow", function () { });
        $(".view_single_news").hide("slow", function () { });
        $(".news_table").show("slow", function () { });
    });

    $(".create_new_post").click(function () {
        $(".display_all_post").hide("slow", function () { });
        //
    });


    $(".view_news").click(function(e){
        let data = $(this).data('myobject');
        $("#title").text(data.Title);
        $("#content").text(data.News_Content);
        $("#date").text(data.Date);
        $("#time").text(data.Time);

        $("#news_title").text(data.Title);
        $("#news_content").text(data.News_Content); 
        $("#news_date").text(data.Date);
        $("#news_time").text(data.Time);

        $("#edit_title").attr('value', data.Title);
        $("#edit_content").attr('placeholder', data.News_Content);
        $("#edit_contact").attr('value', data.Contact);
        //$("#edit_link").attr('value', data.Date);
        $("#edit_date").attr('value', data.Date);
        $("#edit_time").attr('value', data.Time);

        $(".news_delete").attr('href', 'include/news_confi.php?delete=' +data. NewsId);
        $(".news_edit").attr('href','include/news_confi.php?edit='+data.NewsId);

        $(".view_single_news").show("slow",function(){});
        $(".news_table").hide("slow",function(){});
    });

    //----------> Cases <-----------
    $(".view_cases").click(function (e) {
        let data = $(this).data('object');
        // $("#Case_Fname").attr('placeholder', data.Fname);
        // $("#Case_Mname").attr('placeholder', data.Mname);
        // $("#Case_Lname").attr('placeholder', data.Lname);
        // $("#Case_Program").attr('value', data.Program);
        // $("#inputState").attr('value', data.Year);
        // $("#Case_Hostel").attr('value', data.Hostel);
        // $("#Case_Room").attr('value', data.Room_Numb);
        // $("#Case_Password").attr('value', data.Others);
        // $("#Case_Email").attr('value', data.Email);
        // $("#Case_Contact").attr('value', data.Contact);
        // $("#Case_RelationshipDetails").attr('value', data.Relationship);
        // $("#Case_Relationship").attr('value', data.Detail_Relation);

        $(".view_cases").attr('href', 'include/cases_confi.php?view=' + data.ComplainantId);
    });
});




// $(document).ready(function() {
//     //$(".btn1").click(function() {
//     $("p").hide();
//     //});
//     $(".btn2").click(function() {
//         $("p").show();
//     });
// });


// < p > This is a paragraph. < /p>

// <button class = "btn1" > Hide < /button>
// <button class = "btn2" > Show < /button>