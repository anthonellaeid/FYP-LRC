<script>
    $(document).ready(function(){
/***************************************************************************** 1.Fetch data from database and display***************************************************************/
      function fetch_data(query){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{query:query},
             dataType:"text",
              success: function(data){
                    console.log("query:"+query);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }



fetch_data();



 /***************************************************************************** 1.Insert into DB ***********************************************************************************/
//	1.Ambulance Insertion
$(document).on('click', '#btn_addAmbulance', function(){  
        var ambulance_plateNb = $('#ambulance_plateNb').text();  
        var ambulance_description = $('#ambulance_description').text();  
        var ambulance_final_km = $('#ambulance_final_km').text(); 
        var Ambulance_max_patient_nb = $('#Ambulance_max_patient_nbINS').val();  
		var Ambulance_status_code=$('#selectAmbulance2 :selected').val();
        if(ambulance_plateNb == '')  
        {  
            alert("Enter Ambulance Plate Numberb");  
            return false;  
        }  
        if(ambulance_description == '')  
        {  
            alert("Enter Ambulance Description");  
            return false;  
        } 
        if(ambulance_final_km == '')  
        {  
            alert("enter Ambulance km");  
            return false;  
        }   
		    if(Ambulance_status_code == '--')  
        {  
            alert("Select Ambulance Status");  
            return false;  
        } 
        if(Ambulance_max_patient_nb == '')  
        {  
            alert("enter Ambulance Patient Number");  
            return false;  
        }
        if(Ambulance_max_patient_nb<2 ){
            Ambulance_max_patient_nb=2;
        }
        if(Ambulance_max_patient_nb>4 ){
            Ambulance_max_patient_nb=4;
        }
        $.ajax({  
            url:"DataManagementModel/Ambulance/insertAmbulance.php",  
            method:"POST",  
            data:{ambulance_plateNb:ambulance_plateNb, ambulance_description:ambulance_description,ambulance_final_km:ambulance_final_km,Ambulance_status_code:Ambulance_status_code,Ambulance_max_patient_nb:Ambulance_max_patient_nb},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    }); 
////////////////////////////////////////////////////////////////////////////////End of Ambulance Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	2.STATUS Ambulance Insertion
$(document).on('click', '#btn_addStatus', function(){  
        var Status_desc = $('#ambulanceStatus_descIns').text();  
 console.log('Status_desc');
        if(Status_desc == '')  
        {  
            alert("Enter Status Description");  
            return false;  
        }  
		
        $.ajax({  
            url:"DataManagementModel/statusAmb/insertStatusAmb.php",  
            method:"POST",  
            data:{ambulanceStatus_desc:Status_desc},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
				fetch_data();
            }  
        })  
    });						
////////////////////////////////////////////////////////////////////////////////End of STATUS Ambulance Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//  3.Address Insertion
$(document).on('click', '#btn_addAddress', function(){  
        var Address_desc = $('#Address_desc').text();  
        var Is_hospital = $('#Is_hospital').val();  
        var Is_event = $('#Is_event').val(); 
		var Address_city=$('#selectAddress2 :selected').val();
        if(Address_desc == '')  
        {  
            alert("Enter Address Name");  
            return false;  
        }  
        if(Is_hospital == '')  
        {  
            alert("Enter If the Address is Hospital ");  
            return false;  
        } 
        if( Is_hospital>1){
            Is_hospital=1;
        }
        if(Is_event == '')  
        {  
            alert("enter If the Address is Event ");  
            return false;  
        }   
        if( Is_event>1){
            Is_event=1;
        }
		    if(Address_city == '--')  
        {  
            alert("Select Addres City");  
            return false;  
        } 
        if(Is_event==1 && Is_hospital==1){
            alert ("error");
            return false;
        }else{
        $.ajax({  
            url:"DataManagementModel/Address/insertAddress.php",  
            method:"POST",  
            data:{Address_desc:Address_desc, Is_hospital:Is_hospital,Is_event:Is_event,Address_city:Address_city},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();
            }  
        })  
    }
    }); 

////////////////////////////////////////////////////////////////////////////////End of ADDRESS Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	4.City Insertion
$(document).on('click', '#btn_addCity', function(){  
        var City_name = $('#city_nameIns').text();  

        if(City_name == '')  
        {  
            alert("Enter Status Description");  
            return false;  
        }  
		
        $.ajax({  
            url:"DataManagementModel/City/insertCity.php",  
            method:"POST",  
            data:{city_name:City_name},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
fetch_data();            }  
        })  
    });
////////////////////////////////////////////////////////////////////////////////End of City Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	5.Medical Case Insertion
$(document).on('click', '#btn_addMedcialCase', function(){  
        var medicalCase_desc = $('#medicalCase_descIns').text();  

        if(medicalCase_desc == '')  
        {  
            alert("Enter Medical Case Description");  
            return false;  
        }  
		
        $.ajax({  
            url:"DataManagementModel/Medical/insertMedicalCase.php",  
            method:"POST",  
            data:{medicalCase_desc:medicalCase_desc},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();            }  
        })  
});
	////////////////////////////////////////////////////////////////////////////////End of Medical Case Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\				
//	6.CM Kit Insertion
$(document).on('click', '#btn_addCMKit', function(){  
        var CMKIT = $('#cm_kit_descIns').text();  

        if(CMKIT == '')  
        {  
            alert("Enter CM KIT");  
            return false;  
        }  
		
        $.ajax({  
            url:"DataManagementModel/CM/insertCMkit.php",  
            method:"POST",  
            data:{cm_kit_desc:CMKIT},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();            }  
        })  
});
////////////////////////////////////////////////////////////////////////////////End of CM kit Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	7.UHF Radio Insertion
$(document).on('click', '#btn_addUHF', function(){  
        var uhf_radio_desc = $('#uhf_radio_descIns').text();  

        if(uhf_radio_desc == '')  
        {  
            alert("Enter #UHF Radio");  
            return false;  
        }  
		
        $.ajax({  
            url:"DataManagementModel/UHF/insertUHF.php",  
            method:"POST",  
            data:{uhf_radio_desc:uhf_radio_desc},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();            }  
        })  
});
////////////////////////////////////////////////////////////////////////////////End of UHF Radio Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	8.Shift Insertion
$(document).on('click', '#btn_addShift', function(){  
        var shift_code = $('#shift_codeIns').text();  
        var shift_desc=$('#shift_descIns').text(); 	
        var shift_start_hour=$('#shift_start_hourIns').val();
        var shift_end_hour=$('#shift_end_hourIns').val();
        if(shift_code == '')  
        {  
            alert("Enter shift Code Radio");  
            return false;  
        } 
        if(shift_desc == '')  
        {  
            alert("Enter shift Description Radio");  
            return false;  
        }
        if(shift_start_hour=='' || shift_end_hour=='' ){
            alert("Enter Shift Start, End Hour");
        } else{
       
        $.ajax({  
            url:"DataManagementModel/Shift/insertShift.php",  
            method:"POST",  
            data:{shift_code:shift_code,shift_desc:shift_desc,shift_start_hour:shift_start_hour,shift_end_hour:shift_end_hour},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();            }  
        }) } 
});
////////////////////////////////////////////////////////////////////////////////End of UHF Radio Insertion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		

/***************************************************************************** 3.Edit Data *****************************************************************************************/
//  1.Edit Ambulance
function edit_dataAmb(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/Ambulance/editAmbulance.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result1').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.ambulance_plateNb', function(){  
        var ID = $(this).data("id1");  
        var ambulance_plateNb = $(this).text();  
        edit_dataAmb(ID, ambulance_plateNb, "ambulance_plateNb");  
    });  
    $(document).on('blur', '.ambulance_description', function(){  
        var ID = $(this).data("id2");  
        var ambulance_desc = $(this).text();  
        edit_dataAmb(ID,ambulance_desc, "ambulance_description");  
    });
	
	 $(document).on('blur', '.ambulance_final_km', function(){  
        var ID = $(this).data("id3");  
        var ambulance_km = $(this).text();  
        edit_dataAmb(ID,ambulance_km, "ambulance_final_km");  
    });
	
	 $(document).on('change', '#selectAmbulance', function(){  
        var ID = $(this).data("id4");  
        var ambulance_stat = $(this).val();  
		console.log(ambulance_stat);
        edit_dataAmb(ID,ambulance_stat, "Ambulance_status_code"); //we take ID, and ambulance_stat text in order to update via id value and  "Ambulance_status_code" column name which wiil have ambulance_stat value
    });	
    $(document).on('change', '.Ambulance_max_patient_nb', function(){  
        var ID = $(this).data("id5");  
        var ambulance_maxPatientNb = $(this).val(); 
        if(ambulance_maxPatientNb<2){
            ambulance_maxPatientNb=2;
            fetch_data();
        } 
		console.log(ambulance_maxPatientNb);
        console.log("ambulance_maxPatientNb: ID:"+ID);

        edit_dataAmb(ID,ambulance_maxPatientNb, "Ambulance_max_patient_nb"); //we take ID, and ambulance_stat text in order to update via id value and  "Ambulance_status_code" column name which wiil have ambulance_stat value
    });	

//////////////////////////////////////////////////////////////////////// End of Edit Ambulance \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//////////////////////////////////////////////////////////////////////// End of Edit Ambulance \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	2.Edit STATUS Ambulance 
function edit_dataStatus(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/statusAmb/editStatusAmb.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result2').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.ambulanceStatus_desc', function(){  
        var ID = $(this).data("id1");  
        var ambulanceStatus_desc = $(this).text();  
        edit_dataStatus(ID, ambulanceStatus_desc, "ambulanceStatus_desc");  
    });  
///////////////////////////////////////////////////////////////////// End of Edit STATUS Ambulance \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//  3.Edit Address
function edit_dataAddresss(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/Address/editAddress.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
				$('#result3').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  					
    $(document).on('blur', '.Address_desc', function(){  
        var ID = $(this).data("id1");  
        var Address_desc = $(this).text();  
        edit_dataAddresss(ID, Address_desc, "Address_desc");  
    });  
    $(document).on('blur', '.Is_hospital', function(){  
        var ID = $(this).data("id2");  
        var Is_hospital = $(this).val();  
            var ID2 = $(this).data("id3");  
            var Is_event = $(this).val();
            if(Is_event==1 && Is_hospital==1 ){
           alert(" Error");
           fetch_data();
        }else{     
        edit_dataAddresss(ID,Is_hospital, "Is_hospital");  }
    });
	
	 $(document).on('blur', '.Is_event', function(){  
        var ID = $(this).data("id3");  
        var Is_event = $(this).val(); 
            var ID2 = $(this).data("id2");  
            var Is_hospital = $(this).val(); 
        if(Is_event>1){
            Is_event=1;
        }
        if(Is_event==1 && Is_hospital==1 ){
           alert(" Error");
           fetch_data();
        }else{
        edit_dataAddresss(ID,Is_event, "Is_event");  }
    });
	
	 $(document).on('change', '#selectAddress', function(){  
        var ID = $(this).data("id4");  
        var Address_city = $(this).val();  
		console.log(Address_city);
        edit_dataAddresss(ID,Address_city, "Address_city"); //we take ID, and ambulance_stat text in order to update via id value and  "Ambulance_status_code" column name which wiil have ambulance_stat value
    });	
///////////////////////////////////////////////////////////////////// End of Edit Address \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	4.Edit City 
function edit_dataCity(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/City/editCity.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result4').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.city_name', function(){  
        var ID = $(this).data("id1"); 
console.log(ID);		
        var city_name = $(this).text(); 
console.log(city_name);		
        edit_dataCity(ID, city_name, "city_name");  
    });
////////////////////////////////////////////////////////////////////////////////End of Edit City \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	

//	5.Edit Medical Case 
function edit_dataMedicalCase(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/Medical/editMedicalCase.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result5').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.medicalCase_desc', function(){  
        var ID = $(this).data("id1");  
        var medicalCase_desc = $(this).text();  
        edit_dataMedicalCase(ID, medicalCase_desc, "medicalCase_desc");  
    });  
////////////////////////////////////////////////////////////////////////////////End of Edit Medical Case \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//	6.Edit CM-Kit 
function edit_dataCMkit(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/CM/editCMkit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
				$('#result6').html("<div class='alert alert-success'>"+data+"</div>");
				
            }
			
        });
fetch_data();    }  
    $(document).on('blur', '.cm_kit_desc', function(){  
        var ID = $(this).data("id1");  
        var cm_kit_desc = $(this).text();  
        edit_dataCMkit(ID, cm_kit_desc, "cm_kit_desc");  
    });  
////////////////////////////////////////////////////////////////////////////////End of CM kit Case \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	7.Edit UHF-Radio 
function edit_dataUHF(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/UHF/editUHF.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
				$('#result7').html("<div class='alert alert-success'>"+data+"</div>");
				
            }  
        });  
//fetch_data();		
    }  	
    $(document).on('blur', '.uhf_radio_desc', function(){  
        var ID = $(this).data("id1");  
        var uhf_radio_desc = $(this).text();  
        edit_dataUHF(ID, uhf_radio_desc, "uhf_radio_desc");  
		
    });  
////////////////////////////////////////////////////////////////////////////////End of UHF Case \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
// 8. Edit Shift
function edit_dataShift(id, text, column_name)  
    {  
        $.ajax({  
            url:"DataManagementModel/Shift/editShift.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
			$('#result8').html("<div class='alert alert-success'>"+data+"</div>");
				
            }  
        });  
//reloadPage();		
    }  	
  
    $(document).on('blur', '.shift_desc', function(){  
        var ID = $(this).data("id1");  
        var shift_desc = $(this).text();  
        edit_dataShift(ID, shift_desc, "shift_desc");  
		
    }); 
    $(document).on('blur', '.shift_start_hour', function(){  
        var ID = $(this).data("id2");  
        var shift_start_hour = $(this).val();
        edit_dataShift(ID, shift_start_hour+":00", "shift_start_hour");  
		
    }); 
    $(document).on('blur', '.shift_end_hour', function(){  
        var ID = $(this).data("id3");  
        var shift_end_hour = $(this).val();  
        edit_dataShift(ID, shift_end_hour+":00", "shift_end_hour");  
		
    }); 
////////////////////////////////////////////////////////////////////////////////End of SHIFT \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		


/***************************************************************************** 4.Delete Data****************************************************************************************/
//	1.Delete Ambulance
$(document).on('click', '.btnDeleteAmbulance', function(){  
        var id=$(this).data("id6");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/Ambulance/deleteAmbulance.php",  
                method:"POST",  
                data:{id:id},  //id1:id0 ::> 'id1': is the value existing in deleteAmbulance.php file, 'id0': is the var from this document ->var id=$(this).data("id5");
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });
////////////////////////////////////////////////////////////////////////////////End of Ambulance Deletion\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	2.DELETE STATUS Ambulance 
$(document).on('click', '.btn_deleteStatus', function(){  
        var id=$(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/statusAmb/deleteStatusAmb.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();                }  
            });  
        }  
    });
////////////////////////////////////////////////////////////////////////////////End of Delete STATUS Ambulance \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//  3.DELETE Address
$(document).on('click', '.btnDeleteAddress', function(){  
        var id=$(this).data("id5");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/Address/deleteAddress.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
fetch_data();					
                }  
            });  
        }  
    });
////////////////////////////////////////////////////////////////////////////////End of Delete Address \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//	4.DELETE City 
$(document).on('click', '.btn_deleteCity', function(){  
        var id= $(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/City/deleteCity.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
					fetch_data();
                }  
            });  
        }  
	
    });
 
////////////////////////////////////////////////////////////////////////////////End of Delete Address \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//	4.DELETE City 
$(document).on('click', '.btn_deleteCity', function(){  
        var id= $(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/City/deleteCity.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
					fetch_data();
                }  
            });  
        }  
	
    });
 
////////////////////////////////////////////////////////////////////////////////End of Delete City \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//	5.DELETE Medical Case 
$(document).on('click', '.btn_deleteMedicalCase', function(){  
        var id=$(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/Medical/deleteMedicalCase.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();                }  
            });  
        }  
	});

////////////////////////////////////////////////////////////////////////////////End of Delete Medical Case \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	6.DELETE CM kit 
$(document).on('click', '.btn_deleteCMkit', function(){  
        var id=$(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/CM/deleteCMkit.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();                }  
            });  
        }  
	});
////////////////////////////////////////////////////////////////////////////////End of Delete CM Kit \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	7.DELETE UHF kit 
$(document).on('click', '.btn_deleteUHF', function(){  
        var id=$(this).data("id2");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/UHF/deleteUHF.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();                }  
            });  
        }  
	});
////////////////////////////////////////////////////////////////////////////////End of Delete UHF Radio Kit \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		
//	7.DELETE Shift
$(document).on('click', '.btnDeleteShift', function(){  
        var id=$(this).data("id4");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"DataManagementModel/Shift/deleteShift.php",  
                method:"POST",  
                data:{id:id}, 
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();                }  
            });  
        }  
	});
////////////////////////////////////////////////////////////////////////////////End of Delete UHF Radio Kit \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\		

/***************************************************************************** THE END*************************************************************************************************/

function reloadPage(){
        location.reload();
    }
	 });

 /********************** */




   



    </script>