# 🍕 L'Antico Forno - Sistema di Gestione FullStack

Questo è il sistema di amministrazione della pizzeria **L'Antico Forno**, ideato e sviluppato per gestire il menu e gli accessi in modo sicuro ed efficiente. Questo sistema fa parte di un progetto sviluppato durante il **Corso Tecnico di Sviluppo e Gestione Siti Web presso Forte Chance Torino**.

## 🚀 Funzionalità (CRUD)

Il sistema è stato strutturato sui pilastri del **CRUD**, permettendo una gestione completa dei dati nel database MySQL:
* **Create**: Registrazione di nuovi amministratori e nuovi gusti di pizza.
* **Read**: Visualizzazione dinamica dei dati provenienti dal database.
* **Update**: Modifica di pizze, prezzi, ingredienti e immagini.
* **Delete**: Rimozione di utenti e articoli dal menu.

## 🛡️ Sicurezza di Livello Professionale

La sicurezza è stata la priorità massima nello sviluppo di questo backend:

* **Crittografia delle Password**: Utilizziamo la funzione `password_hash()` di PHP con l'algoritmo **BCRYPT**, garantendo che le password non vengano mai salvate in chiaro nel database.
* **Protezione contro SQL Injection**: Tutte le interazioni con MySQL utilizzano **Prepared Statements** (`prepare` e `bind_param`), neutralizzando qualsiasi tentativo di manipolazione delle query da parte di utenti malintenzionati.
* **Controllo della Sessione**: Sistema di login robusto con `session_start()` e convalida dell'autenticazione su tutte le pagine interne per impedire l'accesso diretto tramite URL.

## 🛠️ Tecnologie Utilizzate

* **PHP**: Logica di backend e elaborazione dati.
* **MySQL**: Database relazionale.
* **CSS3**: Interfaccia personalizzata con feedback visivo (Alert di successo/errore).
* **JavaScript**: Perfezionamento dell'UX per il controllo della cache e della cronologia del browser.

---

## ⚙️ Come eseguire il progetto localmente

Se desideri testare il progetto sul tuo computer, segui questi passaggi:

1. **Clona il repository:**
   ```bash
   git clone [https://github.com/tuo-username/l-antico-forno.git](https://github.com/tuo-username/l-antico-forno.git)