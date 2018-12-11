<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2 style="margin-left: 40%;">Job Circle User Contact Information</h2>
<table style="font-family: arial, sans-serif;margin-left:auto; margin-right:auto;">
  <tr>
    <th style="border: 1px solid #dddddd; padding: 8px;">Name</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">Email</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">Phone</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">Message</th>
  </tr>
  <tr style="background-color: #dddddd;">
    <td style=" width:118px;border: 1px solid #dddddd; text-align: center; padding: 8px"><?php echo $name; ?></td>
    <td style="border: 1px solid #dddddd; text-align: center; padding: 8px"><?php echo $email; ?></td>
    <td style="border: 1px solid #dddddd; text-align: center; padding: 8px"><?php echo $phone; ?></td>
    <td style="max-width:300px;border: 1px solid #dddddd; text-align: left; padding: 8px"><?php echo $user_message; ?></td>
    
  </tr>
</table>


</body>
</html>