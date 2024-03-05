# Security aspects of digital identity

Information protection is an integral part of the communication in a modern society. Sharing sensitive data on social networks, easy to use services, increasingly sophisticated threats and vulnerabilities, increasing number of digital identities in e-commerce and digital banking and unmanaged global digitization during pandemics require active approach to data protection and research new options to minimize the impact of security incidents. The thesis describes security aspects in communication between the consumer and service provider during authentication and proposes procedures that can describe these factors, categorize, measure and evaluate their impact on authentication.

The output of work is an application that suggests an optimal form of authentication based on the user's inputs. 
Required input data are: 
Type of classified data (public data, internal data, data protected, strictly protected data, non-classified data); 
Application architecture (1-layer, 2-layer, etc.); 
Type of authentication protocol (MTSL, LDAP, NTLM, RADIUS, ...) or authentication framework (Kerberos / OAuth / SAML / OIDC); 
Location of consumer and provider (local network, cloud storage); 
Requested authentication factors (1FA, 2FA, 3FA, MFA), 
Requirement for digital signing or integrity control (RSA, HMAC, OTP, HASH), 
Requested encryption (RSA, ECC, AES, DEC, 3DES) and 
Requested application role (an anonymous user, standard user, administrator, ...).

Keywords: Informatics. Digital identity. CyberSecurity. Authentication. Authentication protocol. Security aspects.

# DOCKER Version
Howto to use docker version  
```bash
docker-compose down
git clone badirepo  
cd badi  
docker-compose build  
docker-compose up -d  
```  

# Cleanup after changes  
Stop and remove containers:  
```bash
docker-compose down
```  
Remove Docker containers and volumes: Run the following command to stop and remove all Docker containers and volumes associated with your project:   
```bash
docker-compose down -v
```  

Remove or move all data from folder /data manually (it's your database), after running docker-compose build all demo data will be imported again.  

# Run the application  
https://localhost  
Users and passwords  
user/user               [standard user role]  
operator/operator       [role for IT Architects (playing with models)]    
ra/ra                   [risk analyst]  
admin/admin             [application administrator]  


phpMyAdmin  
http://localhost:8080/  
root/root 

# GENERATE SELF-SIGNED CERTIFICATE USING OPENSSL
Install openssl and open your terminal.  

Generate a private key:  
```bash
openssl genrsa -out private.key 4096
```  
Generate a certificate signing request (CSR):  
```bash
openssl req -new -key private.key -out server.csr -subj "/C=US/ST=YourState/L=YourCity/O=Example-Certificates/CN=localhost"
```  
Generate a self-signed certificate:  
```bash
openssl x509 -req -days 3650 -in server.csr -signkey private.key -out certificate.crt
```  



