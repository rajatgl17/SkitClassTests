jQuery(document).ready(function(){$.backstretch(["assets/img/backgrounds/1.jpg","assets/img/backgrounds/2.jpg","assets/img/backgrounds/3.jpg"],{duration:3e3,fade:750}),$(".links a.home").tooltip(),$(".links a.blog").tooltip(),$(".register form").submit(function(){$(this).find("label[for='firstname']").html("First Name"),$(this).find("label[for='lastname']").html("Last Name"),$(this).find("label[for='username']").html("Username"),$(this).find("label[for='email']").html("Email"),$(this).find("label[for='password']").html("Password");var a=$(this).find("input#firstname").val(),b=$(this).find("input#lastname").val(),c=$(this).find("input#username").val(),d=$(this).find("input#email").val(),e=$(this).find("input#password").val();return""==a?($(this).find("label[for='firstname']").append("<span style='display:none' class='red'> - Please enter your first name.</span>"),$(this).find("label[for='firstname'] span").fadeIn("medium"),!1):""==b?($(this).find("label[for='lastname']").append("<span style='display:none' class='red'> - Please enter your last name.</span>"),$(this).find("label[for='lastname'] span").fadeIn("medium"),!1):""==c?($(this).find("label[for='username']").append("<span style='display:none' class='red'> - Please enter a valid username.</span>"),$(this).find("label[for='username'] span").fadeIn("medium"),!1):""==d?($(this).find("label[for='email']").append("<span style='display:none' class='red'> - Please enter a valid email.</span>"),$(this).find("label[for='email'] span").fadeIn("medium"),!1):""==e?($(this).find("label[for='password']").append("<span style='display:none' class='red'> - Please enter a valid password.</span>"),$(this).find("label[for='password'] span").fadeIn("medium"),!1):void 0})});