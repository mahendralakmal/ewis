

$( "#clientProfile" ).validate({
    rules: {
        name: "required",
        email: {
            required: true,
            email: true
        },
        address: {
            required: true
        },
        telephone: {
            required: true
        },
        logo: {
            required: true
        },
        color: {
            required: true
        },
        cp_name: {
            required: true
        },
        cp_designation: {
            required: true
        },
        cp_branch: {
            required: true
        },
        cp_telephone: {
            required: true
        },
        cp_email: {
            required: true
        }
    }
});


$( "#userCreate" ).validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required:true,
            minlength:6,
            maxlength:12
        },
        cpassword: {
            equalTo: "#password"
        },
        name: "required",
        designation: {
            required: true,
        },
        nic_pass: {
            required:true,
            maxlength:12,
            minlength:7
        },
    }
});
