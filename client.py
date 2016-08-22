import socket

HOST = '127.0.0.1'
PORT = 5005
MyCarID = "pdfaspkdasp"
Message = MyCarID
Buffer_size = 1024

s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.connect((HOST,PORT))
s.send(Message)
data = s.recv(Buffer_size)
s.close()

print "received data : ", data
