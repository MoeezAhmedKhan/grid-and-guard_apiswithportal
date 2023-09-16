<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<title>verification slip</title>
	<style>
		.print-wrapper {
			background-image: url('bg-image.png');
			max-width: 750px;
			margin: auto;
			font-family: 'Roboto', sans-serif;
			-webkit-print-color-adjust: exact;
			/* Chrome, Safari 6 – 15.3, Edge */
			color-adjust: exact;
			/* Firefox 48 – 96 */
			print-color-adjust: exact;
			/* Firefox 97+, Safari 15.4+ */
		}

		img {
			max-width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.nin {
			padding: 20px 20px 10px;
			padding-left: 30px;
		}

		table {
			width: 100%;
		}

		ul {
			list-style: none;
			margin: 0;
			margin-bottom: 4px;
			padding: 0;
		}

		ul li {
			font-size: 19px;
			color: #7f7f7f;
			text-transform: uppercase;
			display: flex;
			align-items: center;
			justify-content: space-between;
			line-height: 1.3;
		}

		ul li:last-child {
			color: #000000;
			text-transform: capitalize;
			font-size: 18px;
		}

		@media print {
			.print-wrapper {
				background-image: url('bg-image.png');
				max-width: 600px;
				margin: auto;
				font-family: 'Roboto', sans-serif;
				-webkit-print-color-adjust: exact;
				/* Chrome, Safari 6 – 15.3, Edge */
				color-adjust: exact;
				/* Firefox 48 – 96 */
				print-color-adjust: exact;
				/* Firefox 97+, Safari 15.4+ */
			}

			img {
				max-width: 100%;
				height: 100%;
				object-fit: cover;
			}

			.nin {
				padding: 20px 20px 10px;
				padding-left: 30px;
			}

			table {
				width: 100%;
			}

			ul {
				list-style: none;
				margin: 0;
				margin-bottom: 4px;
				padding: 0;
			}

			ul li {
				font-size: 19px;
				color: #7f7f7f;
				text-transform: uppercase;
				display: flex;
				align-items: center;
				justify-content: space-between;
				line-height: 1.3;
			}

			ul li:last-child {
				color: #000000;
				text-transform: capitalize;
				font-size: 18px;
			}
		}
	</style>
</head>

<div class="print-wrapper">
	<div class="nin">
		<table>
			<tbody>
				<tr>
					<td style="width:70%; vertical-align: top;">
						<h1
							style="font-size: 24px; font-weight: 900; text-transform: uppercase; color:#22b14c; margin: 0; padding-left: 20px;">
							Federal public of nigeria</h1>
						<h2
							style="font-size: 18px; font-weight: 900; text-transform: uppercase; color:#000000;  margin-bottom: 22px; margin-top: 0; padding-left: 20px;">
							Digital verification slip</h2>
						<table>
							<tbody>
								<tr>
									<td style="width:30%; vertical-align: top;">
										<div style="width:120px; height:120px; background: #fff;">
											<img src="left-image.jpg" alt=""/>
                                            </div>
									</td>
									<td style="width:70%; padding: 15px 0 35px 15px;">
										<ul>
											<li>Surname/nom</li>
											<li>Usman Ahmad</li>
										</ul>
										<ul>
											<li>Given names/prenoms</li>
											<li>Usman Ahmad</li>
										</ul>
										<div style="display: flex; justify-content:space-between;">
											<ul>
												<li>Date of birth</li>
												<li>12/09/2005</li>
											</ul>
											<ul>
												<li>Sex/sexe</li>
												<li>Male</li>
											</ul>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td style="width:30%; text-align: center; vertical-align: top;">
						<div style="width: 160px; height: 150px;">
							<img src="right-image.png" alt=""/>
                            </div>
							<h3
								style="color:#000000; text-transform: uppercase; font-size:24px; margin-top: 10px; font-weight: 900; margin-bottom: 5px;">
								Nga</h3>
							<ul>
								<li style="color: #000000; font-weight: 700; justify-content: center;">Issue Date</li>
								<li style="justify-content: center;">30/11/2022</li>
							</ul>
					</td>
				</tr>
				<tr>
					<td style="width:100%; text-align: center;" colspan="2">
						<h4
							style="font-size: 20px; text-transform: uppercase; color: #000000; font-weight: 800; margin-bottom: 5px; margin-top: 0;">
							National identification number (nin)</h4>
						<p style="margin: 0; color: #000000; font-size: 16px;">Verified by CheckMyPeople - NIMC Licensed
							Verification Service Provider</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</html>