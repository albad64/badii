# utilizza come immagine base l’immagine alpine-java con jdk 8 già configurato
FROM anapsix/alpine-java

# crea una variabile d’ambiente di nome APP
ENV APP /usr/local/myapp

# crea una cartella al path specificato da $APP
RUN mkdir $APP

# in fase di costruzione dell’immagine, tutti i file presenti sul pc dell’host (nella directory corrente) 
# verranno copiati nell’immagine dentro la cartella $APP
COPY * $APP/

# tutte le operazioni dopo questo comando verranno effettuate nella directory $APP
WORKDIR $APP

# Definisce un comando di base quando si lancia il container dell’immagine. 
# In particolare verrà lanciata la shell bash
CMD ["bash"]
