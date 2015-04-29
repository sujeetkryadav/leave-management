
                      $(function() {
                      $('#popupDatepicker').datepick({yearRange: "1900:-18",
                             onSelect:function(){
                             var num=document.getElementById("days").value;
                             var date1=document.getElementById("popupDatepicker").value;
                             var dmy = date1.split("/");   
                             if(num!='')
                             {  
                             //alert(parseInt(num)+2)  ;
                              // "24/06/2011" should be pulled from $("#DatePicker").val() instead
                                    var joindate = new Date(
                                        parseInt(dmy[2], 10),
                                        parseInt(dmy[1], 10) - 1,
                                        parseInt(dmy[0], 10)
                                    );
                                    //alert(joindate);                          // Fri Jun 24 2011 00:00:00 GMT+0500 (West Asia Standard Time) 
                                    joindate.setDate(joindate.getDate() + parseInt(num)-1); // substitute 1 with actual number of days to add
                                   // alert(joindate);                          // Sat Jun 25 2011 00:00:00 GMT+0500 (West Asia Standard Time)
                                    
                     var finalDta= ("0" + joindate.getDate()).slice(-2) + "/" +
                                   ("0" + (joindate.getMonth() + 1)).slice(-2) + "/" +
                                  joindate.getFullYear();
                                        //alert(finalDta);
                     var date1=document.getElementById("popupDatepick").value=finalDta;
                                            }
                                            else
                                            {
                     var date1=document.getElementById("popupDatepick").value=date1;
                 
                                            }
                                        }

                                     });


                         $("#days").change(function(){
                           var num=document.getElementById("days").value;
                             var date1=document.getElementById("popupDatepicker").value;
                             var dmy = date1.split("/");   
                             if(num!='')
                             {  
                             //alert(parseInt(num)+2)  ;
                              // "24/06/2011" should be pulled from $("#DatePicker").val() instead
                                    var joindate = new Date(
                                        parseInt(dmy[2], 10),
                                        parseInt(dmy[1], 10) - 1,
                                        parseInt(dmy[0], 10)
                                    );
                                    //alert(joindate);                          // Fri Jun 24 2011 00:00:00 GMT+0500 (West Asia Standard Time) 
                                    joindate.setDate(joindate.getDate() + parseInt(num)-1); // substitute 1 with actual number of days to add
                                   // alert(joindate);                          // Sat Jun 25 2011 00:00:00 GMT+0500 (West Asia Standard Time)
                                    
                     var finalDta= ("0" + joindate.getDate()).slice(-2) + "/" +
                                   ("0" + (joindate.getMonth() + 1)).slice(-2) + "/" +
                                  joindate.getFullYear();
                                        //alert(finalDta);
                     var date1=document.getElementById("popupDatepick").value=finalDta;
                                            }
                                            else
                                            {
                     var date1=document.getElementById("popupDatepick").value=date1;
                 
                                            }
                         });
                         
                        });


               
                    
