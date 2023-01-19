<!DOCTYPE html lang="en">
<html>
<head>
    <title>User Profile PDF</title>
    <style type="text/css">
        body{margin: 0;}
    </style>
</head>
<body style="width: 100%;">
    <div style="width: 100%;text-align: center;border-top: 5px solid #23c0e9;padding-top: 12px;padding-bottom: 12px;"></div>
    <div style="width: 100%;background-color: #23c0e9;color: #fff;padding-top: 30px;padding-bottom: 30px;">
        <div style="width: 90%;margin: 0 auto;">
            <h1 style="margin: 0;font-size: 25px;font-weight: 700;text-transform: uppercase;">{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</h1>
            <h2 style="margin: 5px 0;font-size: 18px;font-weight: 400;">{{ $user_detail->email }}</h2>
            <h3 style="margin: 5px 0;font-size: 18px;font-weight: 400;">{{ $user_detail->mobile_number }}</h3>
        </div>
    </div>
    <div style="width: 100%;padding-top: 40px;">
        <div style="width: 90%;margin: 0 auto;padding-bottom: 40px;border-bottom: 2px solid #23c0e9;">
            <div style="width: 64%;display: inline-block;vertical-align: top;">
                <h3 style="font-size: 20px;font-weight: 600;color: #0A66C2;text-transform: uppercase;">About Me</h3>
                <p style="font-size: 16px;font-weight: 400;color: #000;text-align: justify;">{!! $user_detail->description !!}</p>
            </div>
            <div style="width: 35%;display: inline-block;text-align: center;vertical-align: top;"></div>
        </div>
    </div>
    <div style="width: 100%;padding-bottom: 35px;">
        <div style="width: 90%;margin: 0 auto;">
            <div style="width: 69%;display: inline-block;vertical-align: top;border-right: 2px solid #23c0e9;padding-top: 40px;padding-bottom: 40px;">
                <h3 style="font-size: 20px;font-weight: 600;color: #0A66C2;text-transform: uppercase;padding-right: 56px;">About Present Work</h3>
                <p style="font-size: 16px;font-weight: 400;color: #000;text-align: justify;padding-right: 56px;">{!! $user_detail->presernt_work !!}</p>
                <h3 style="font-size: 20px;font-weight: 600;color: #0A66C2;margin-top: 50px;text-transform: uppercase;padding-right: 56px;">AREA oF INTEREST</h3>
                <ul style="font-size: 16px;font-weight: 400;color: #000;">
                    <li><strong>Categories</strong> : {{ $cat_one }}, {{ $cat_two }}, {{ $cat_three }}, {{ $cat_four }}, {{ $cat_five }}</li>
                    <br/>
                    <li><strong>Selection of job by Designation</strong> : {{ $designation_title }}</li>
                </ul>
            </div>
            <div style="width: 30%;display: inline-block;vertical-align: top;padding-top: 40px;">
                <h3 style="font-size: 20px;font-weight: 600;color: #0A66C2;text-transform: uppercase;padding-left: 24px;">Overview</h3>
                <ul style="font-size: 16px;font-weight: 400;color: #000;">
                    <li><strong>DOB</strong> : {{ $user_detail->dob }}</li>
                    <br/>
                    <li><strong>WhatsApp</strong> : {{ $user_detail->other_number }}</li>
                    <br/>
                    <li><strong>Address</strong> : {{ $user_detail->address }}</li>
                    <br/>
                    <li><strong>City</strong> : {{ $user_detail->city }}</li>
                    <br/>
                    <li><strong>Pincode</strong> : {{ $user_detail->zip_code }}</li>
                    <br/>
                    <li><strong>State</strong> : {{ $user_detail->state }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="width: 100%;height: 5px;background-color: #23c0e9;"></div>
</body>
</html>