<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="x-apple-disable-message-reformatting">
	<title>Scienze Jobs : Jobs For Scientists By The Scientists</title>
	<style>
		table, td, div, h1, p{font-family: Arial, sans-serif;}
	</style>
</head>
<body style="margin:0;padding:0;background: #f0f0f0;">
	<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#f0f0f0;">
		<tr>
			<td align="center" style="padding:0;">
				<table role="presentation" style="width:602px;text-align:left;">
					<tr>
						<td align="center" style="padding:40px 0 30px 0;">
							<img src="http://scienzejobs.com/assets/images/header/logo.png" alt="Scienze Jobs Logo" width="300" style="height:auto;display:block;" />
						</td>
					</tr>
					<tr>
						<td style="padding:36px 30px 42px 30px;background: #ffffff;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
								<tr>
									<td style="padding:0 0 36px 0;color:#153643;">
										<h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Hi {{ $name }},</h1>
										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;text-align: justify;">Here are the latest Jobs for you :</p>
									</td>
								</tr>
								<tr>
									<td style="padding:0;">
										<table role="presentation" style="width:100%;border-collapse:collapse;border:1px solid #0164af;border-spacing:0;">
											<tr style="background: #0164af;color: #ffffff;">
												<th style="padding: 10px;">Job Description</th>
												<th style="padding: 10px;">Salary</th>
											</tr>
											<?php $i = 0; foreach($job as $jobs){if($i++ < 10){ ?>
												<tr style="border-bottom: 1px solid #0164af;">
													<td style="width: 70%;padding: 10px;color: #153643;">
														<div>
															<p style="font-size: 16px;"><strong>{{ $jobs->job_title }}</strong></p>
															<p style="margin: 0 0 12px 0;font-size: 16px;line-height: 24px;font-family: Arial,sans-serif;text-align: justify;">{{ substr($jobs->expectation, 0, 200) }}...</p>
														</div>
													</td>
													<td style="width: 25%;padding: 10px;">
														<div>
															<p style="margin: 0;font-size: 16px;line-height: 24px;margin-bottom: 15px;font-family: Arial,sans-serif;"><strong>{{ $jobs->salary }}</strong></p>
															<p style="margin: 0;font-size: 16px;line-height: 24px;font-family: Arial,sans-serif;">
																<a href="http://scienzejobs.com/job" target="_blank" style="color: #ffffff;text-decoration:none;background: #f38a26;padding: 10px;border-radius: 10px;">View Detail</a>
															</p>
														</div>
													</td>
												</tr>
											<?php $i++;}} ?>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<p style="margin-top: 25px;font-size: 12px;font-weight: 400;color: #888;">For Unsubscribe our emails, <a href="http://scienzejobs.com/user-login" target="_blank" style="color: #23c0e9;">click here</a>.</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding:30px;background:#23c0e9;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
								<tr>
									<td style="padding:0;width:50%;" align="left">
										<p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">© 2022 Scienze Jobs. All Rights Reserved.</p>
									</td>
									<td style="padding:0;width:50%;" align="right">
										<table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
											<tr>
												<td style="padding:0 0 0 10px;width:38px;">
													<a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
												</td>
												<td style="padding:0 0 0 10px;width:38px;">
													<a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>