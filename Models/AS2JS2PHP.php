<script type="text/javascript">
var long = <?php
echo $_POST['longitude'];
?>;

var lat =    <?php
echo $_Post['latitude'];
?>;



function postRefreshPage () {
    var locs = ["51.38254","-2.362804", "51.235249","-2.297804", "-2.899154" , "53.395123", "-2.537949", "53.684928","-1.511449"];
    var input = [];
    var i =0;

    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = 'JS2AS.php';
    theForm.method = 'post';
    // Next create the <input>s in the form and give them names and values
    var ar[];

    // var obj = {
    //     "distance"             :        30,
    //     "duration"             :        "25 minutes",
    //     "end_address"          :        "51 Street 9, Maadi as sarayat Al Gharbeyah, Al Maadi, Cairo Governerate, Egypt",
    //     "end_location"         :        "John",
    //     "start_address"        :        "9 Street 256, Maadi as sarayat Al Gharbeyah, Al Maadi, Cairo Governerate, Egypt",
    //     "start_location"       :        [""],
    //     "steps"                :        [""],
    //     "traffic_speed_entry"  :        [""],
    //     "via_waypoint"         :        [""],
    //     "via_waypoints"        :        [""],
    //     "prototype"            :        ""
    // }
    var obj = {
        "distance"             :        30,
        "duration"             :        "25 minutes",
        "end_address"          :        "51 Street 9, Maadi as sarayat Al Gharbeyah, Al Maadi, Cairo Governerate, Egypt",
        "hello world"          :        ["multiple, values, reside, here"]
    }
    console.log("Type of abc",var abc = typeof(obj);)
    /*
     siblings: [
        Andrew,
        Christine];
      */
    var myJSON = JSON.stringify(obj);

    for (let z = 0 ; i < ; i++){
        ar[i].push(myJSON);
    }

    for (x in locs) {
        input[i]= document.createElement('input');
        input[i].type = 'hidden';
        input[i].name = 'input'+[i];
        input[i].value = locs[i];
        theForm.appendChild(input[i]);
        i++;
        }

    document.getElementById('hidden_form_container').appendChild(theForm);
    // ...and submit it
    theForm.submit();
}
</script>


