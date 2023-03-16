// //search approved by year
// $(document).ready(function(){
//     $("#search_year").click(function(){
//         let payment_year = document.getElementById("payment_year").value;
//         alert(payment_year);
        
//         // $.ajax({
//         //     type: "POST",
//         //     url: "search_approved.php",
//         //     data: {approved_year:approved_year},
//         //     success: function(response){
//         //         $(".the_approved").html(response);
//         //     }
//         // });
//         return false;
//     });
// });
/* display registered members */
$(document).ready(function(){
    $("#acceptMembersBtn").click(function(){
        $("#acceptMembers").show();
         document.getElementById('member').style.display = "none";
        document.getElementById('approvedMembers').style.display ="none";
        document.getElementById('paidMembers').style.display ="none";
        document.getElementById('createUsers').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        $("#declinedMembers").hide();
        $("#membersLocation").hide();
        $("#change_password").hide();
        
    });
});

/* display cnfirm payment */
$(document).ready(function(){
    $("#approveMembers").click(function(){
        $("#approvedMembers").show();
        document.getElementById('acceptMembers').style.display ="none";
        document.getElementById('paidMembers').style.display ="none";
        document.getElementById('createUsers').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.getElementById('member').style.display = "none";
        $("#declinedMembers").hide();
        $("#membersLocation").hide();
        $("#change_password").hide();

    });
});


/* display approved members */
$(document).ready(function(){
    $("#approvedBtn").click(function(){
        $("#paidMembers").show();
        document.getElementById('acceptMembers').style.display ="none";
        document.getElementById('approvedMembers').style.display ="none";
        document.getElementById('createUsers').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.getElementById('member').style.display = "none";
        $("#declinedMembers").hide();
        $("#membersLocation").hide();
        $("#change_password").hide();

    });
});

 /* display create new users */
 $(document).ready(function(){
    $("#createBtn").click(function(){
        $("#createUsers").show();
        document.getElementById('acceptMembers').style.display ="none";
        document.getElementById('approvedMembers').style.display ="none";
        document.getElementById('paidMembers').style.display ="none";
        document.querySelector('.summary').style.display = "none";
        document.getElementById('member').style.display = "none";
        $("#declinedMembers").hide();
        $("#change_passport").hide();
        $("#membersLocation").hide();
        $("#change_password").hide();

    });
});

/* display declined members */
$(document).ready(function(){
    $("#declinedBtn").click(function(){
        $("#declinedMembers").show();
         document.getElementById('member').style.display = "none";
        document.getElementById('approvedMembers').style.display ="none";
        document.getElementById('paidMembers').style.display ="none";
        document.getElementById('createUsers').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        $("#acceptMembers").hide();
        $("#change_passport").hide();
        $("#membersLocation").hide();
        $("#change_password").hide();

    });
});
/* display members by location*/
$(document).ready(function(){
    $("#locationBtn").click(function(){
        $("#membersLocation").show();
        $("#declinedMembers").hide();
         document.getElementById('member').style.display = "none";
        document.getElementById('approvedMembers').style.display ="none";
        document.getElementById('paidMembers').style.display ="none";
        document.getElementById('createUsers').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        $("#acceptMembers").hide();
        $("#change_passport").hide();
        $("#change_password").hide();

    });
});

/* display member profile */
function displayMemberProfile(id){
    window.open("admin.php?profile="+id,"_parent");
    return;
}

/* get id to approve members */
function approvePayments(id){
    window.open("approve_member.php?approve="+id,"_parent");
    return;
}    
/* get id to decline members */
function declinePayment(id){
    window.open("decline_members.php?decline="+id,"_parent");
    return;
}

/* display submit payment */
$(document).ready(function(){
    $("#paymentBtn").click(function(){
        $("#makePayment").show();
        document.getElementById('receipt').style.display = "none";
        document.getElementById('updateProfile').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.querySelector('.memberInfo').style.display = "none";
        $("#change_passport").hide();
        $("#change_password").hide();
        
    });
});

/* display receipt */
$(document).ready(function(){
    $("#showReceiptBtn").click(function(){
        $("#receipt").show();
        document.getElementById('makePayment').style.display = "none";
        document.getElementById('updateProfile').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.querySelector('.memberInfo').style.display = "none";
        $("#change_passport").hide();
        $("#change_password").hide();

    });
});

/* display update profile*/
$(document).ready(function(){
    $("#updateBtn").click(function(){
        $("#updateProfile").show();
        document.getElementById('receipt').style.display = "none";
        document.getElementById('makePayment').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.querySelector('.memberInfo').style.display = "none";
        $("#change_passport").hide();
        $("#change_password").hide();

    });
});
/* display Change passport*/
$(document).ready(function(){
    $("#updatePassport").click(function(){
        $("#change_passport").show();
        $("#updateProfile").hide();
        document.getElementById('receipt').style.display = "none";
        document.getElementById('makePayment').style.display = "none";
        document.querySelector('.summary').style.display = "none";
        document.querySelector('.memberInfo').style.display = "none";
        $("#change_password").hide();
    });
});
/* display Change password*/
$(document).ready(function(){
    $("#changePassword").click(function(){
        $("#change_password").show();
        $("#change_passport").hide();
        $("#updateProfile").hide();
        $("#receipt").hide();
        $("#makePayment").hide();
        // document.querySelector('.memberInfo').style.display = "none";
        $("#approvedMembers").hide();
            $("#acceptMembers").hide();
            $("#paidMembers").hide();
            $(".summary").hide();
            $(".member_profile").hide();
            $("#declinedMembers").hide();
        $("#membersLocation").hide();
        $("#createUsers").hide();
    });
});

/* display menu */
$(document).ready(function(){
    $("#menu").click(function(){
        $("aside").toggle();
    })
})
/* function removeAside(){
    document.querySelector('aside').style
} */


/* search members */
// let searchInput = document.getElementById("search");

/* let inputs = document.getElementById("search");
let rows = document.querySelectorAll("#memberTable tbody tr");
// console.log(rows);
inputs.addEventListener('keyup', function(event){
    // console.log(event);
    let q = event.target.value.toLowerCase();
    rows.forEach(row => {
        // console.log(row);
        row.querySelector('tr').textContent.toLowerCase().startsWith(q) ? row.style.display = '' : row.style.display = 'none';
    });
});  */
let $rows = $('#memberTable tbody tr');
$('#search').keyup(function() {
    let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
/* search decined members */
let $row = $('#declinedTable tbody tr');
$('#searchDecline').keyup(function() {
    let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $row.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
/* search approved members */
let $rons = $('#approvedTable tbody tr');
$('#searchApprove').keyup(function() {
    let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rons.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
/* search location members */
let $ron = $('#locationTable tbody tr');
$('#searchLocation').keyup(function() {
    let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $ron.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});

/* let $rows2 = $('#approvedTable tr');
$('#search2').keyup(function() {
    let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows2.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
}); */
/* display methods of payment */
$(document).ready(function(){
    $("#manual").click(function(){
        $("#manual_form").show();
        $("#online_form").hide();
     /*    $("#online").hide(); */
        $(".method").hide();
    });
})
$(document).ready(function(){
    $("#online").click(function(){
        $("#manual_form").hide();
        $("#online_form").show();
        // $("#manual").hide();
        $(".method").hide();
    });
})

/* if member is a not a new registration */
function showPrevious(a){
    if (a == "No"){
        document.getElementById("previousPlace").style.display = 'block';
    }else{
        document.getElementById("previousPlace").style.display = 'none';
    }
}

/* display from dashboard */
function displayFromDashboard(){
    $(document).ready(function(){
        $("#newReg").click(function(){
            $("#acceptMembers").show();
            $("#approvedMembers").hide();
            $("#paidMembers").hide();
            $(".summary").hide();
            $(".member_profile").hide();
            $("#declinedMembers").hide();
            $("#change_password").hide();
        
        })
    })
    $(document).ready(function(){
        $("#declined").click(function(){
            $("#approvedMembers").show();
            $("#acceptMembers").hide();
            $("#paidMembers").hide();
            $(".summary").hide();
            $(".member_profile").hide();
            $("#declinedMembers").hide();
            $("#change_password").hide();

        })
    })
    $(document).ready(function(){
        $("#approved").click(function(){
            $("#paidMembers").show();
            $("#approvedMembers").hide();
            $("#acceptMembers").hide();
            $(".summary").hide();
            $(".member_profile").hide();
            $("#declinedMembers").hide();
            $("#change_password").hide();

        })
    })
    $(document).ready(function(){
        $("#declinedMember").click(function(){
            $("#declinedMembers").show();
            $("#paidMembers").hide();
            $("#approvedMembers").hide();
            $("#acceptMembers").hide();
            $(".summary").hide();
            $(".member_profile").hide();
            $("#change_password").hide();

        })
    })
}
displayFromDashboard();

/* download members to excel */
$(document).ready(function(){
    
    $(".download_members").click(function(){
        /* alert ("yea"); */
        $("#memberTable").table2excel({
            filename: "ACPN_Registerd_members.xls"
        });
    })
})
/* download approve members */
$(document).ready(function(){
    
    $(".approved_mem").click(function(){
        /* alert ("yea"); */
        $("#approvedTable").table2excel({
            filename: "ACPN_Approved_members.xls"
        });
    })
})
/* download members by location */
function downloadMembers(){
        $("#locationTable").table2excel({
            filename: "ACPN_Edo_members_location.xls"
        });
    
}

/* download member profile */
$(document).ready(function(){
    
    $(".memberProf_download").click(function(){
        
        $("#membersProfiles").table2excel({
            filename: "ACPN_Member_Profile.xls"
        });
    })
})

/* var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
$(document).ready(function(){
$('.memberProf_download').click(function () {
    alert
    doc.fromHTML($('#mem').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
}); */
        // search payment year

