package concurrenciaej;

import java.io.*;
import java.net.*;
import java.util.*;

public class Server {
    private static Server instance;
    private static final int PORT = 12345;
    private final List<ClientHandler> clients = Collections.synchronizedList(new ArrayList<>());

    private Server() {}

    public static synchronized Server getInstance() {
        if (instance == null) {
            instance = new Server();
        }
        return instance;
    }

    public void start() {
        try (ServerSocket serverSocket = new ServerSocket(PORT)) {
            System.out.println("Server is running...");
            while (true) {
                Socket socket = serverSocket.accept();
                ClientHandler handler = new ClientHandler(socket, this);
                clients.add(handler);
                new Thread(handler).start();
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public synchronized void broadcast(String message, ClientHandler sender) {
        for (ClientHandler client : clients) {
            if (client != sender) {
                client.sendMessage(message);
            }
        }
    }

    public synchronized void removeClient(ClientHandler clientHandler) {
        clients.remove(clientHandler);
    }

    public synchronized List<String> getActiveUsers() {
        List<String> usernames = new ArrayList<>();
        for (ClientHandler client : clients) {
            usernames.add(client.getUsername());
        }
        return usernames;
    }

    public synchronized void notifyUserList() {
        String userList = String.join(", ", getActiveUsers());
        broadcast("Server: Active users - " + userList, null);
    }

    public static void main(String[] args) {
        Server.getInstance().start();
    }
    
    
    public synchronized ClientHandler getClientByUsername(String username) {
        for (ClientHandler client : clients) {
            if (client.getUsername().equals(username)) {
                return client;
            }
        }
        return null;
    }
}

class ClientHandler implements Runnable {
    private Socket socket;
    private Server server;
    private PrintWriter out;
    private BufferedReader in;
    private String username;

    public ClientHandler(Socket socket, Server server) {
        this.socket = socket;
        this.server = server;
    }

    @Override
    public void run() {
        try {
            in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            out = new PrintWriter(socket.getOutputStream(), true);

            while (true) {
                out.println("Enter your username: ");
                username = in.readLine();
                if (username != null && !username.trim().isEmpty()) {
                    break;
                }
                out.println("Invalid username. Try again.");
            }

            server.broadcast(username + " has joined the chat!", this);
            server.notifyUserList();

            String message;
            while ((message = in.readLine()) != null) {
                if (message.startsWith("/msg")) {
                    String msg = message.substring(5);
                    server.broadcast(username + ": " + msg, this);
                } else if (message.startsWith("/private")){
                    handlePrivateMessage(message.substring(9).trim());
                }
                else if (message.startsWith("/logout")) {
                    server.broadcast(username + " has left the chat!", this);
                    break;
                } else {
                    out.println("Unknown command: " + message);
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            server.removeClient(this);
            server.notifyUserList();
        }
    }
    
    private void handlePrivateMessage(String messageContent){
        try {
            int spaceIndex = messageContent.indexOf("");
            if(spaceIndex == -1){
                out.println("Usage: /private <username> </message>");
                return;
            }
            String recipientUsername = messageContent.substring(0, spaceIndex);
            String privateMessage = messageContent.substring(spaceIndex + 1);
            
            ClientHandler recipient = server.getClientByUsername(recipientUsername);
            if(recipient != null){
                recipient.sendMessage("Mensaje privado por:  "+ username +":  "+ privateMessage);
                out.println("Mensaje privado enviado a:  "+ recipientUsername);
            } else {
                out.println("User   "+ recipientUsername + "not found");
            }
        } catch (Exception e){
            out.println("Error al enviar mensaje privado.");
            e.printStackTrace();
        }
    }

    public void sendMessage(String message) {
        out.println(message);
    }

    public String getUsername() {
        return username;
    }
}
