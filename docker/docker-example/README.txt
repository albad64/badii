--------------------------------------------------------------------------
-- Steps per costruire l'immagine docker con l'applicazione spring-boot --
--------------------------------------------------------------------------

0) Su windows si consiglia di utilizzare Powershell per eseguire i comandi docker.

1) In una directory posizionare il Dockerfile, il jar spring-boot e tutti i file che si vogliono importare nell'immagine

2) Spostarsi nella directory creata precedentemente

3) Eseguire il comando: docker build -t <nome-immagine> .
	3.1) esempio: docker build -t springBoot .
	3.2) Notare il punto "." alla fine del comando, che serve per specificare la directory corrente per la build
	
4) Se si vogliono lanciare diversi containers e farli comunicare tra di loro è consigliato creare una "docker network" che permette
   a tutti i containers di essere su una stessa rete virtuale e comunicare tramite indirizzo ip docker o l'hostname=<nome container>
	4.1) creare la network chiamata my-network: docker network create my-network
	4.2) verifica la creazione tramite: docker network ls
	
5) Creare un container a partire dall'immagine precedente (chiamata springBoot):
	docker run -it --name=springBootApp --net my-network -p 8080:8080 springBoot
	5.1) Il comando precedente crea un container a partire dall immagine "springBoot".
	5.2) Il nome di questo container è springBootApp.
	5.3) Il container appartiene alla rete "my-network" e espone verso il pc dell'host la porta 8080 del container sulla porta 8080 dell'host. (convenzione -p containerPort:hostPort)
	5.4) Viene eseguito il comando di default scritto nel Dockerfile (bash) e quindi l'host potrà subito interagire con la shell linux del
	container (necessari anche i parametri -it)
	5.5) Supponiamo di creare un ulteriore container a partire dalla stessa immagine:
	docker run -it --name=springBootApp2 --net my-network -p 8080:8080 springBoot
	I due container, essendo stati creati sulla stessa network possono ora comunicare o tramite gli indirizzi IP dei container o tramite gli hostname
	che docker associa automaticamente ad essi, cioè: springBootApp e springBootApp2. Esempio: dal container springBootApp eseguire ping springBootApp2
	
7) Se abbiamo eseguito tutti i comandi fino al punto 5 (esluso il punto 5.5) dovremo trovarci all'interno del container springBootApp con la 
	shell di linux in esecuzione. Ora tramite i comandi linux possiamo verificare che:
	7.1) Ci troviamo nella WORKDIR e che tutti i file, compreso il jar spring-boot sono stati caricati sul container, quindi eseguire: ls
	7.2) Possiamo lanciare il jar di spring-boot per avviarlo.
	
8) Una volta che l'applicazione spring-boot è in funzione per uscire dal container senza spegnerla premere: CRTL+P CTRL+Q questo effettuerà il
	detach e tornerà il controllo alla macchina dell'host. Eseguire docker ps per verificare che il container è ancora in esecuzione.

NOTE:
- Se si scrivono fie/scripts su windows e poi l'immagine docker usa come SO linux bisogna stare attenti al carattere di fine linea utilizzato.
--> Su linux si può lanciare il comando: dos2unix "nomefile" per convertirne il carattere di fine linea
--> Su Notepad++ è possibile impostare il carattere di fine linea con formato UNIX in Modifica->Converti Carattere di fine linea->Formato UNIX
