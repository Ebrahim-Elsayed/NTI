# Task .... 
Hospital management system that have 3 main types of users 1-admins 2-doctors 3-Patients.
With the following data.
Admins (name, email, password ),
Patients name, email, password,
Doctors name, email, password, specialize, gender.
Doctors have appointments and Patients can reserve these appointments.
Note : doctor can accept or refuse reservations.
Requirments : create a database structure.




# patient
id   name  email  password    doctor_id    appointment_id
1     x    x@x    1234            1             1
2     y    y@x    1244            2             2


#doctor 
id    name    email    password  specialize  gender   apointmet_id
1      ah      a@a        x         snan      female
1      eb      eb@a       y         batna      male
           

#appointments
id     stardate      enddate       details  doctor_id
1         11           1             ....          


# admin
id   name  email  password        
1     x    x@x    1234       
2     y    y@x    1244       



# Relations 

doctor     patient 
1            m 
1            1
========================
1            m





appointment     patient 
1                 1 
m                 1
========================
1                 1




appointment     doctor 
1                 1 
m                 1
========================
m                 1



<!-- #users 
id    name    email    password  specialize  gender   role_id
1      ah      a@a        x         snan      female     1
1      eb      eb@a       y         batna      male      2
            -->


roles 
id    type 
1     admin 
2     doctor 
3     patient




roles    users  
1         m 
1         1
============
1        m








