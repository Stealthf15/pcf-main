<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PCF Request</title>
    <style>
        .container {
            margin: auto;
        }
        .header-container {
            display: inline-flex;
        }
        table, td, th {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .pcf-no,
        .revision-container {
            float: right !important;
        }
        .pdf-title {
            text-align: center;
            text-decoration: underline;
        }
        .header-details-container{
            position: relative;
            margin-bottom: 15px;
        }
        .header-details-container .pdf-details {
            font: 100;
        }
        .header-details-container .pdf-details > span {
            position: relative;
            display: block;
            padding: 0px;
        }
        .div-footer-container  {
            margin-top: 50px !important;
            display: inline-block;
        }
        .div-footer-container .approve-by-container > span {
            position: relative;
            display: block;
        }
        .div-footer-container .revision-container > span{
            display: block;
        }
        .docs-note {
            font-size: 14px !important;
            font-weight: bold !important;
            text-align: left;
            margin-top: 100px !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container">
            <div class="logo">
                <img src="{{ public_path("img/logo.png") }}" height="80" width="250">
            </div>
            <div class="pcf-no">
                <h3>PCF NO: {{ $pcf_no }}</h3>
            </div>
        </div>
        <div class="header-details-container">
            <div class="pdf-title">
                <h2>PROFITABILITY COMPUTATION FORM</h2>
            </div>
            <div class="pdf-details">
                <span>DATE: {{ $get_pcf_list[0]->date }}</span>
                <span>INSTITUTION: {{ $get_pcf_list[0]->institution }}</span>
                <span>DURATION OF CONTRACT (NO. OF YEARS): {{ $get_pcf_list[0]->duration }}</span>
                <span>DATE OF BIDDING: {{ $get_pcf_list[0]->date_biding }}</span>
                <span>BID DOCS PRICE: {{ number_format($get_pcf_list[0]->bid_docs_price,2) }}</span>
                <span>PSR and Manager: {{ $get_pcf_list[0]->psr .' ,'. $get_pcf_list[0]->manager }}</span>
                <span>Annual Profit: {{ number_format($get_pcf_list[0]->annual_profit,2) }}</span>
                <span>Annual Profit Rate: {{ $get_pcf_list[0]->annual_profit_rate.'%' }}</span>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ITEM CODE</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>QTY (PER YEAR)</th>
                    <th>SALES</th>
                    <th>TOTAL SALES</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grand_total_sales = 0;
                @endphp
                @foreach ($get_pcf_list as $request)
                    <tr>
                        <td>{{ $request->item_code }}</td>
                        <td>{{ $request->description }}</td>
                        <td style="text-align: center">{{ $request->quantity }}</td>
                        <td style="text-align: right">{{ number_format($request->sales,2) }}</td>
                        <td style="text-align: right">{{ number_format($request->total_sales,2) }}</td>
                    </tr>
                    @php
                        $grand_total_sales += $request->total_sales; 
                    @endphp
                @endforeach
                <tr style="font-weight: bold;">
                    <td colspan="4" style="text-align: right;">TOTAL SALES</td>
                    <td style="text-align: right; background-color: #fff200;">{{ ($grand_total_sales == 0 ? '- ' : number_format($grand_total_sales, 2)) }}</td>
                </tr>
            </tbody>
        </table>
        <h5>MACHINES AND INCLUSIONS (FOC REAGENTS, LIS CONNECTIVITY, INTERFACE, OTHER ITEMS)</h5>
        <table>
            <thead>
                <tr>
                    <th>ITEM CODE</th>
                    <th>ITEM DESCRIPTION</th>
                    <th colspan="2">SERIAL NO. (IF MACHINE TO BE BID IS NOT BRAND NEW)</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($get_pcf_inclusions as $request)
                    <tr>
                        <td>{{ $request->item_code }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ ($request->type == 'MACHINE' ? $request->type : '') }}</td>
                        <td>{{ ($request->type == 'COGS' ? $request->type : '') }}</td>
                        <td style="text-align: right;">{{ $request->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="div-footer-container">
            <div class="approve-by-container">
                <span>Approve By: _____________</span>
                <span style="padding-left: 85px;">Accounting</span>
            </div>
            <div class="revision-container" style="margin-top: -100px;">
                <span>FM-ACC-07</span>
                <span>Revision No. 00</span>
                <span>Effective Date: 03/25/2020</span>
            </div>
        </div>
        <div class="docs-note">
            <span>NOTE: NO PCF SHALL PROCEED TO BIDDING WITHOUT ACCOUNTING SIGNATURE</span>
        </div>
    </div>
</body>
</html>