<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mzumbe LUKU Token Purchase System</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
</head>
<body>

    <div id="container">
        <div id="header">
            <h1>MZUMBE UNIVERSITY LUKU SYSTEM</h1>
            <p>Prepaid Electricity Purchase Gateway — CSS 221 Assignment</p>
        </div>

        <div id="form-box">
            <h2>Buy Electricity Token</h2>
            <div id="status-message"></div>

            <form id="lukuForm" action="process.php" method="post">
                <div class="form-group">
                    <label for="meter_number">Meter Number (11 Digits):</label>
                    <input type="text" id="meter_number" name="meter_number" maxlength="11" />
                </div>

                <div class="form-group">
                    <label for="amount">Amount (TZS):</label>
                    <input type="text" id="amount" name="amount" />
                </div>

                <div class="form-group">
                    <label for="mobile_network">Select Mobile Network:</label>
                    <select id="mobile_network" name="mobile_network">
                        <option value="">-- Choose Network --</option>
                        <option value="M-Pesa">Vodacom M-Pesa</option>
                        <option value="Tigo Pesa">Tigo Pesa</option>
                        <option value="Airtel Money">Airtel Money</option>
                        <option value="Halo Pesa">Halotel Halo Pesa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone_number">Payment Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" placeholder="e.g. 0712345678" />
                </div>

                <div class="form-group">
                    <input type="submit" id="submitBtn" value="Purchase Token Now" />
                </div>
            </form>
        </div>
        
        <div id="footer">
            <p>&copy; 2026 Mzumbe University. Supervised by Bertha M. Lebalwa, MSc. Evaluated by Mr. Kadefue.</p>
        </div>
    </div>

</body>
</html>