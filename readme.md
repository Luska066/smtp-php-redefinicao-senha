jogue esta pagina no htdocs 

configure seu php.ini assim:

[mail function]
; For Win32 only.
; https://php.net/smtp
SMTP=smtp.gmail.com
; https://php.net/smtp-port
smtp_port=25

; For Win32 only.
; https://php.net/sendmail-from
sendmail_from=lucas.santsena@gmail.com

; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").
; https://php.net/sendmail-path
sendmail_path=D:\XAMPP\sendmail\sendmail.exe -> essa pasta se localiza na sua Pasta XAMPP

; Force the addition of the specified parameters to be passed as extra parameters
; to the sendmail binary. These parameters will always replace the value of
; the 5th parameter to mail().
;mail.force_extra_parameters =

; Add X-PHP-Originating-Script: that will include uid of the script followed by the filename
mail.add_x_header=Off

; Use mixed LF and CRLF line separators to keep compatibility with some
; RFC 2822 non conformant MTA.
mail.mixed_lf_and_crlf=Off


Acesse agora o sendmail.ini



; configuration for fake sendmail

; if this file doesn't exist, sendmail.exe will look for the settings in
; the registry, under HKLM\Software\Sendmail

[sendmail]

; you must change mail.mydomain.com to your smtp server,
; or to IIS's "pickup" directory.  (generally C:\Inetpub\mailroot\Pickup)
; emails delivered via IIS's pickup directory cause sendmail to
; run quicker, but you won't get error messages back to the calling
; application.

smtp_server=smtp.gmail.com

; smtp port (normally 25)

smtp_port=25

; SMTPS (SSL) support
;   auto = use SSL for port 465, otherwise try to use TLS
;   ssl  = alway use SSL
;   tls  = always use TLS
;   none = never try to use SSL

smtp_ssl=auto

; the default domain for this server will be read from the registry
; this will be appended to email addresses when one isn't provided
; if you want to override the value in the registry, uncomment and modify

;default_domain=seuemail@emai.com

; log smtp errors to error.log (defaults to same directory as sendmail.exe)
; uncomment to enable logging

error_logfile=error.log

; create debug log as debug.log (defaults to same directory as sendmail.exe)
; uncomment to enable debugging

debug_logfile=debug.log

; if your smtp server requires authentication, modify the following two lines

auth_username= seuemail@email.com
auth_password=senha criada no gmail

; if your smtp server uses pop3 before smtp authentication, modify the 
; following three lines.  do not enable unless it is required.

pop3_server=
pop3_username=
pop3_password=

; force the sender to always be the following email address
; this will only affect the "MAIL FROM" command, it won't modify 
; the "From: " header of the message content

;force_sender=seuemail@email.com

; force the sender to always be the following email address
; this will only affect the "RCTP TO" command, it won't modify 
; the "To: " header of the message content

force_recipient=

; sendmail will use your hostname and your default_domain in the ehlo/helo
; smtp greeting.  you can manually set the ehlo/helo name if required

hostname=


Configure a senha para acessar seu servidor SMTP do gmail

1 Va em Gerenciar Sua Conta e procure "Senhas de Aplicativo" ou "App Passwords"
2 Em "Selecionar App" escolhar outros, escolha um nome para identificar, e copie o código gerado por ele,
esse código será a sua senha e cole dentro do sendmail.ini no campo 'auth_password'.

execute esses comandos no seu banco de dados MYSQL :

create table usuarios(
	id int primary key auto_increment,
    nome varchar(150),
    email varchar(200),
    senha varchar(250)
);

create table recover_solicitation(
	id int primary key auto_increment,
    email varchar(200),
    rash varchar(200),
    stats int
);

select * from recover_solicitation;
select * from usuarios;

insert into usuarios(nome,email,senha) values('admin','insira aqui um email existente','cole uma senha gerada na criptografia md5');

você pode gerar a senha aqui =D : https://www.md5hashgenerator.com/


