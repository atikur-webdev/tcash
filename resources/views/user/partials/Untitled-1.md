step 1:make a database table for dps,
column name:
id,
dps name,
installment interval,
total installment,
per installment,
interest rate,

step 2:show dps button to user navbar, done
step 3:show the dps plan to User/dashboard/dps, done
step 4:User can see the plan and button Apply now,if user click on that then the the per_installment will be cut from user balance
step 5:Before click on apply now we need to check user balance for paying minimum per_installment


process:first make route and controller,
click korle user->balance - per_installment;
dps table e column anbo status active,of,
r apply te click korle balance katbo r status active kore dibo,
tarpor user k redirect korbo mydps e,sekhane jegula user er active dps ache ogulake table er maddhome show korabo,



<!-- step1:apply hobar pore dps er list asbe ekta page,
step2:oi page er controller e first e:
first installment jedin gese oidiner date ber korte hobe,
oidin theke next 30 diner date ber korte hobe,
30 din porer data pele ami user balance theke taka kete dibo,r given installment baray dibo,
confuision hocce,
ami 30 diner porer date ke installment_interval er stahe milabo kivabe,
amar installment_interval e lekha 30,
tahole next 30 day porer date ke 30 er sathe kivabe milabo,
ajke 11-11-25 30 din pore 11-12-25 ei date take kivabe 30 er stahe milabo, -->

r ekta kaj kora jai,
ami given_installment jokhon 1 setake bolbo day 1;
r jokhon day 1 == 30 tokhon user er balance theke taka kete nilam
tahole ekahne ekta loop hobe,day k increment kore dibo,day jedin 30 e jabe tar pore abar loop first e asbe,
kintu problem hocche loop ghurar por given_installment 2 hobe,
er pore to loop r cholbe na,



*****:installment name ekta table hobe,jekhane user dps e apply korle installment table e installment data add hobe;



curr_date 25-11-12 12:02 >= 12:00 25-12-11 next 30 days






first installment 11-10,
next installment 12-10,


first problem:ami date ber korte pari nai,
second problem:ami alada installment table e