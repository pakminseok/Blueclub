import socket
HOST = '127.0.0.1'
PORT = 5005

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(1)

MyCarID = "123456789"
Message = MyCarID

conn, addr=s.accept()
print('Connected by', addr)

while True:
    data = conn.recv(1024)
    if not data: break
    print("Recieved: "+(data))
    conn.send(Message)
conn.close()