//Calendar Demo
$(function() {


    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /* initialize the calendar
        -----------------------------------------------------------------*/

    $('#calendar').fullCalendar({

        dayClick: function(date, allDay, jsEvent, view) {
        var projectId = $('#projectId').val();
        var userId = $('#userId').val();
        var status = $('#ustatus').val();

        if(date.getMonth()<10){
            prefix = "0";    
        }else{
            prefix = "";
        }
        
        var taskDate = date.getFullYear()+'-'+prefix+(date.getMonth()+1)+'-'+date.getDate();

        var count =1;

        res= "";
        
        //alert(projectId);
        //alert(userId);
        //alert(taskDate);

        $('#calTaskTable').find('tr').slice(1).remove();

        $('#userdprTable').find('tr').slice(1).remove();
       
        
        $.get( "/showTask", {'projectId' : projectId, 'userId' : userId, 'taskDate' : taskDate, 'status' : status  }, function( data ) {
        if(data.task.length !== 0){
            $.each(data.task, function() {
                $.each(this, function(k, v) {
                    //alert(k + ' ' + v);
                    $("#calTaskTable").find('tbody')
                    .append($('<tr>')
                        .append($('<td>').text(count))
                        .append($('<td>').text(v))
                        );
                    count = count + 1;
                });
            });

            $.each(data.report, function(k, v) {
                tab = $("#userdprTable").find('tbody');
                    $.each(this, function(k, v) {
                            res = res + '<td>'+v+'</td>';
                    });
                tab.append('<tr>'+res+'</tr>');
                res = "";
            });
        
            
        }else{
            $("#calTaskTable").find('tbody')
            .append($('<tr>')
                .append($('<td>').text(""))
                .append($('<td>').text("No data"))
            );

            $.each(data.report, function(k, v) {
                tab = $("#userdprTable").find('tbody');
                    $.each(this, function(k, v) {
                            res = res + '<td>'+v+'</td>';
                    });
                tab.append('<tr>'+res+'</tr>');
                res = "";
            });
        }
       
            }, "json" 
        );

       /* if (allDay) {
            // Clicked on the entire day
            $('#calendar')
                .fullCalendar('changeView', 'agendaDay'/* or 'basicDay' )
                .fullCalendar('gotoDate',
                    date.getFullYear(), date.getMonth(), date.getDate());
        } */
    },
    
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        
    });

    /* initialize the external events
        -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
        });

    });


});
