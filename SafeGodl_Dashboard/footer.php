
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script type="text/javascript" src="vendor/global/global.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" src="js/custom.min.js"></script>
	<script type="text/javascript" src="js/deznav-init.js"></script>
    <script type="text/javascript" src="js/demo.js"></script>
    <script type="text/javascript" src="js/styleSwitcher.js"></script>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <script type="text/javascript">
        try {

            var is_mainnet = parseInt('<?php echo $is_mainnet?"56":"97" ?>');

            var accountID, accountBalance, contract, tokenContract, networkId;

            var step = 1;

            var web3 = new Web3(Web3.givenProvider); //  || ropsten_url

            // Checking MetaMask is installed or not
            if (typeof window.ethereum === 'undefined') {
                console.log('Please install MetaMask extension!');
            } else {

                window.ethereum.on('accountsChanged', function (accounts) {
					// Time to reload your interface with accounts[0]!
					$.cookie("MetaMask", "");
					window.location.reload(true);
				});

				window.ethereum.on('networkChanged', function(networkId){
		      		$.cookie("MetaMask", "");
					window.location.reload(true);
			    });

                $(document).on('click', '#connectServer', function(e){
                	e.preventDefault();
                    getAccount();
                });

                if ( typeof $.cookie("MetaMask") !== 'undefined' && $.cookie("MetaMask") == "true" ) {
                    getAccount();
                }

                async function getAccount() {

                    // $('#connectServer').hide();
                    $('.showLoader').show();
                    // $('.step_1 h3').html('Connecting to account....');

                    const accounts = await ethereum.request({ method: 'eth_requestAccounts' });

                    accountID = accounts[0];
                    // console.log('Connected Account: '+accountID);

					await web3.eth.net.getId().then(function(id){
						networkId = id;
					})

					// if( networkId == 97 /*networkId == 56*/ ){
                    if( networkId == is_mainnet ){

	                    $('#connectServer span').html( accountID.substring(1,6)+'...'+accountID.substring((accountID.length)-4) )

	                    $('#connectServer').prop('id', '');

	                    await web3.eth.getBalance(accountID)
						.then(function(balance){
							accountBalance = balance;
						});

	                    $.cookie("MetaMask", "true");

						web3.eth.defaultAccount = accountID;

	                    connectContract(accountID);

	                } else {
                        var title = (is_mainnet == 56)?'Mainnet!':'Testnet!';
	                	alert('Please change your network to BSC '+title);
	                	logError('Please change your network to BSC '+title);
	                }

                }

            }

        } catch(err) {
            console.log('Error:',err.message);
            logError(err.message);
        }

        // function logError(msg, mobile = "", is_error = true){
		function logError(msg, is_error = true){

			/*$('.cardAlerts').hide();

			if( is_error ){
				$('.card-alert-danger').html(msg);
				$('.card-alert-danger').show();
			} else {
				$('.card-alert-success').html(msg);
				$('.card-alert-success').show();
			}*/

			$('.showLoader').hide();

			/*setTimeout(function() {
		        $('.cardAlerts').fadeOut('fast');
		    }, 5000);*/

		}

		// Common
		$(document).ready(function(){
			$(".numberOnly").keydown(function (event) {

				if (event.shiftKey == true) {
					event.preventDefault();
				}

            	if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

            	} else {
                	event.preventDefault();
            	}

            	if($(this).val().indexOf('.') !== -1 && ( event.keyCode == 190 || event.keyCode == 110 ) ){
                	event.preventDefault();
            	}

			});
		});

    </script>

</body>
</html>