<form action="" method="post">
    <h2>RESULT</h2>
    <table class="table" style="overflow:hidden; table-layout: fixed;">
        <tbody>            
            <!--tr>
                <td style="text-align: center;">Number of questions attempted</td>
                <td style="text-align: center;"><?php echo $attempt; ?></td>
            </tr-->
            <tr>
                <td style="text-align: center;">Correct answers</td>
                <td style="text-align: center;"><?php echo $right; ?></td>
            </tr>
            <tr>
                <td style="text-align: center;">Wrong answers</td>
                <td style="text-align: center;"><?php echo $wrong; ?></td>
            </tr>
            <tr>
                <td style="text-align: center;"><b>Total Marks</b></td>
                <td style="text-align: center;"><b><?php echo $total; ?></b></td>
            </tr>
        </tbody>
    </table>
</form>
