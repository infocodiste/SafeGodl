<?php 
	include('header.php');
	include('sidebar.php');

	$key = 'e6a0a002-3742-4c39-8faa-0c8800812346';
	$symbol = 'MNTT';
	$contractAddress = '0x91BF45A9D5B5B386E2eDc0B4E2adC4352CEcD4cA';

	$is_mainnet = true;

	$sgodlPrice = 0;
	$sgodlVolume = 0;

	$bnbPrice = 0;
	$bnbVolume = 0;

	try {

		$sgodlUrl = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol='.$symbol.'&CMC_PRO_API_KEY='.$key;
		$crl = curl_init();

		curl_setopt($crl, CURLOPT_URL, $sgodlUrl);
		curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($crl);

		if( !empty($response) ) {
			$resp = json_decode($response);
			if( !empty($resp) && !empty($resp->status) && !empty($resp->data) && !empty($resp->data->{$symbol}) ){
				$sgodl = $resp->data->{$symbol};
				if( !empty($sgodl->quote) && !empty($sgodl->quote->USD) ){
					$usd = $sgodl->quote->USD;
					$sgodlPrice = !empty($usd->price)?$usd->price:0;
					$sgodlVolume = !empty($usd->volume_24h)?$usd->volume_24h:0;
				}
			}
		}

		curl_close($crl);

	} catch (Exception $e) {
		// 
	}

	try {

		$bnbtUrl = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BNB&CMC_PRO_API_KEY='.$key;
		$crl = curl_init();

		curl_setopt($crl, CURLOPT_URL, $bnbtUrl);
		curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($crl);

		if( !empty($response) ) {
			$resp = json_decode($response);
			if( !empty($resp) && !empty($resp->status) && !empty($resp->data) && !empty($resp->data->BNB) ){
				$bnb = $resp->data->BNB;
				if( !empty($bnb->quote) && !empty($bnb->quote->USD) ){
					$usd = $bnb->quote->USD;
					$bnbPrice = !empty($usd->price)?$usd->price:0;
					$bnbVolume = !empty($usd->volume_24h)?$usd->volume_24h:0;
				}
			}
		}

		curl_close($crl);

	} catch (Exception $e) {
		// 
	}

?>

	<!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
		<div class="container-fluid">


			<div class="row justify-content-center">
				<div class="col-xl-10">

					<div class="text-center">
						<img src="images/new-logo.png" width="300" />
					</div>

					<div class="rewards">

						<div class="inner">

							<div class="heading">
								REWARDS
							</div>

							<div class="rewards-points">
								<div class="row">
									<div class="col-sm-6 col-md-3">
										<div class="points">
											<div class="title">
												YOUR SAFEGODL HOLDINGS
											</div>
											<div class="info">
												<span class="cardOne">0.00</span><br>
												SGODL
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="points">
											<div class="title">
												TOTAL BNB PAID SO FAR
											</div>
											<div class="info">
												<span class="cardTwo">0.00</span><br>
												BNB
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="points">
											<div class="title">
												LAST PAYOUT TIME
											</div>
											<div class="info">
												<span class="date cardThree">00/00/0000</span><br>
												<span class="time cardFive">00:00:00</span>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="points">
											<div class="title">
												PAYOUT LOADING
											</div>
											<div class="info">
												<span class="cardFour">0.00</span><br>
												%
											</div>
											<div class="progress">
												<div></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						
					</div>

					<div class="rewards rewards-2">

						<div class="row">
							<div class="col-sm-6">
								<div class="heading">
									TOTAL BNB PAID <br>
									TO SGODL HOLDERS
								</div>
							</div>
							<div class="col-sm-6" style="position: relative;">
								<div class="points">
									<span class="titkVal">0.00</span> BNB<br />
									= $<span class="dollarVal">0.00</span>
								</div>
							</div>
						</div>

					</div>

					<div class="rewards-summary d-flex justify-content-center align-items-center">
						<div class="summary">
							<div class="top">
								<div class="heading">WHAT YOUR <span class="cardOne">0.00</span> SGODL CAN EARN
									FOR YOU
								</div>
								<div class="list">
									<div class="dailyBNB"><span class="bnb">0.00</span> BNB <span class="dollar">($<span>0.00</span>)</span> Daily</div>
									<div class="weeklyBNB"><span class="bnb">0.00</span> BNB <span class="dollar">($<span>0.00</span>)</span> Weekly</div>
									<div class="monthlyBNB"><span class="bnb">0.00</span> BNB <span class="dollar">($<span>0.00</span>)</span> Monthly</div>
									<div class="yearlyBNB"><span class="bnb">0.00</span> BNB <span class="dollar">($<span>0.00</span>)</span> Yearly</div>
								</div>
							</div>
							<div class="foot">
								Estimations based on 24h of trading volume ($<span class="bnbVolume">0.00</span>)
							</div>
						</div>
						<div class="summary">
							<div class="top">
								<div class="heading">IF YOU REINVEST YOUR DIVIDENDS
									EVERYDAY, YOUR <span class="cardOne">0.00</span> SGODL BECOMES
								</div>
								<div class="list">
									<div class="weeklySGODL"><span class="sgodl">0.00</span> SGODL <span class="dollar">($<span>0.00</span>)</span> 7 Days</div>
									<div class="monthlySGODL"><span class="sgodl">0.00</span> SGODL <span class="dollar">($<span>0.00</span>)</span> 1 Month</div>
									<div class="halfSGODL"><span class="sgodl">0.00</span> SGODL <span class="dollar">($<span>0.00</span>)</span> 6 Months</div>
									<div class="yearlySGODL"><span class="sgodl">0.00</span> SGODL <span class="dollar">($<span>0.00</span>)</span> 1 Year</div>
								</div>
							</div>
							<div class="foot">
								Estimations based current $SGODL price ($<span class="sgodlVolume">0.00</span>)
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
    <!--**********************************
        Content body end
    ***********************************-->

<?php 
	include('footer.php');
?>

<script type="text/javascript">

	var mainnetUrl = '<?php echo $is_mainnet?"api":"api-testnet" ?>';

	var bnbUsdVal = parseFloat("<?php echo $bnbPrice ?>");
	var bnbVolume = parseFloat("<?php echo $bnbVolume ?>").toFixed(2);

	var sgodlUsdVal = parseFloat("<?php echo $sgodlPrice ?>");
	var sgodlVolume = parseFloat("<?php echo $sgodlVolume ?>").toFixed(2);

	var BNBbalanceInContract, userBalance, supplyAmountCompareForBNBRewards = 0;

	var contractAddress = "<?php echo $contractAddress ?>";

	$(document).ready(function(){
		$('.bnbVolume').html(bnbVolume);
		$('.sgodlVolume').html(sgodlUsdVal.toFixed(8));

		if ( typeof $.cookie("MetaMask") !== 'undefined' && $.cookie("MetaMask") == "true" ) {
		} else {
			connectContract()
		}
	})

    async function connectContract(accountID = ''){

    	$('.showLoader').show();

    	BNBbalanceInContract = await web3.eth.getBalance(contractAddress);



		// await $.getJSON("https://"+mainnetUrl+".bscscan.com/api?module=contract&action=getabi&address="+contractAddress, function(abi) {
		await $.getJSON("abi.json", function(abi) {

			var abiJSON = JSON.parse(abi.result);
			contract = new web3.eth.Contract(abiJSON, contractAddress);
			// getData(accountID);
			totalBNB(accountID);
			$('.showLoader').hide();

		});

	}

	async function getData(accountID){
		await contract.methods.getData(accountID).call()
		.then(function(res){

			userBalance = parseFloat( web3.utils.fromWei(res[0], 'gwei') ).toFixed(0);
			$('.cardOne').html( userBalance )

			$('.cardTwo').html( parseFloat(web3.utils.fromWei(res[1], 'ether')).toFixed(6) );

			if( res[2] != '0' ){
				var unix = parseInt(res[2]);
				var dateTime = new Date(unix*1000);

				var MyDateString = ('0' + dateTime.getDate()).slice(-2) + '/' + ('0' + (dateTime.getMonth()+1)).slice(-2) + '/' + dateTime.getFullYear();
				var MyTimeString = ('0' + dateTime.getHours()).slice(-2) + ':' + ('0' + dateTime.getMinutes()).slice(-2) + ':' + ('0' + dateTime.getSeconds()).slice(-2);

				$('.cardThree').html( MyDateString ); // time
				$('.cardFive').html( MyTimeString ); // time
			}

			$('.cardFour').html( res[3] );
			$('.points .progress div').css({'width': res[3]+'%'})

			if( res[5] ){
				bnbReward(accountID);
			}

		}).catch(function(err){
			console.log('Error 1:', err);
		});

	}

	async function bnbReward(accountID){

		BNBbalanceInContract =  parseFloat(web3.utils.fromWei(BNBbalanceInContract, 'ether')).toFixed(6);

		BNBRewards = await contract.methods.supplyAmountCompareForBNBRewards().call();

		supplyAmountCompareForBNBRewards = parseFloat(web3.utils.fromWei(BNBRewards, 'gwei')).toFixed(6);

		var bnbToReward = (BNBbalanceInContract*userBalance)/supplyAmountCompareForBNBRewards;

		var daily = parseFloat(bnbToReward*48).toFixed(2);
		var dailyUsd = parseFloat(daily*bnbUsdVal).toFixed(2);

		$('.dailyBNB span.bnb').html(daily);
		$('.dailyBNB span.dollar span').html(dailyUsd);

		var weekly = parseFloat(daily*7).toFixed(2);
		var weeklyUsd = parseFloat(weekly*bnbUsdVal).toFixed(2);

		$('.weeklyBNB span.bnb').html(weekly);
		$('.weeklyBNB span.dollar span').html(weeklyUsd);

		var monthly = parseFloat(daily*30).toFixed(2);
		var monthlyUsd = parseFloat(monthly*bnbUsdVal).toFixed(2);

		$('.monthlyBNB span.bnb').html(monthly);
		$('.monthlyBNB span.dollar span').html(monthlyUsd);

		var yearly = parseFloat(daily*365).toFixed(2);
		var yearlyUsd = parseFloat(yearly*bnbUsdVal).toFixed(2);

		$('.yearlyBNB span.bnb').html(yearly);
		$('.yearlyBNB span.dollar span').html(yearlyUsd);

		sgodlReward(daily)

	}

	function sgodlReward(daily){

		var dailySgodl = userBalance + ( bnbUsdVal / sgodlUsdVal ) * daily;

		var weekly = parseFloat(dailySgodl*7).toFixed(2);

		var weeklyUsd = parseFloat(weekly*sgodlUsdVal).toFixed(2);

		$('.weeklySGODL span.sgodl').html(weekly);
		$('.weeklySGODL span.dollar span').html(weeklyUsd);

		var monthly = parseFloat(dailySgodl*30).toFixed(2);
		var monthlyUsd = parseFloat(monthly*sgodlUsdVal).toFixed(2);

		$('.monthlySGODL span.sgodl').html(monthly);
		$('.monthlySGODL span.dollar span').html(monthlyUsd);

		var halfSGODL = parseFloat(dailySgodl*182).toFixed(2);
		var halfSGODLUsd = parseFloat(halfSGODL*sgodlUsdVal).toFixed(2);

		$('.halfSGODL span.sgodl').html(halfSGODL);
		$('.halfSGODL span.dollar span').html(halfSGODLUsd);

		var yearlySGODL = parseFloat(dailySgodl*365).toFixed(2);
		var yearlySGODLUsd = parseFloat(yearlySGODL*sgodlUsdVal).toFixed(2);

		$('.yearlySGODL span.sgodl').html(yearlySGODL);
		$('.yearlySGODL span.dollar span').html(yearlySGODLUsd);

	}

	async function totalBNB(accountID){

		$('.showLoader').show();

		accountID = "0x327e2594761A28c36d477930Afe709c18cF5574C";

		await contract.methods.totalBNBPaid().call()
		.then(function(res){

			// console.log('Resp:', res);
			var totalBNBAmt = parseFloat(web3.utils.fromWei(res, 'ether')).toFixed(2);

			$('.titkVal').html( totalBNBAmt );
			$('.dollarVal').html( (totalBNBAmt*bnbUsdVal).toFixed(2) );
			if ( typeof $.cookie("MetaMask") !== 'undefined' && $.cookie("MetaMask") == "true" ) {
				getData(accountID)
			}

		}).catch(function(err){
			console.log('Error:', err);
		});

		$('.showLoader').hide();

	}

</script>