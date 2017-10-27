import socket
import sys
from thread import start_new_thread

HOST = '' # all availabe interfaces
PORT = 1122 # arbitrary non privileged port 

import base64
from Crypto import Random
from Crypto.Cipher import AES

AKEY = 'large_donut_rulz' # AES key must be either 16, 24, or 32 bytes long

iv = Random.new().read(AES.block_size)


def encode(message):
    obj = AES.new(AKEY, AES.MODE_CFB, iv)
    return base64.urlsafe_b64encode(obj.encrypt(message))


def decode(cipher):
    obj2 = AES.new(AKEY, AES.MODE_CFB, iv)
    return obj2.decrypt(base64.urlsafe_b64decode(cipher))

try:
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
except socket.error, msg:
    print("Could not create socket. Error Code: ", str(msg[0]), "Error: ", msg[1])
    sys.exit(0)

print("[-] Socket Created")

# bind socket
try:
    s.bind((HOST, PORT))
    print("[-] Socket Bound to port " + str(PORT))
except socket.error, msg:
    print("Bind Failed. Error Code: {} Error: {}".format(str(msg[0]), msg[1]))
    sys.exit()

s.listen(10)
print("Listening...")

# The code below is what you're looking for ############

def client_thread(conn):
    conn.send("Welcome to the encryption service.\n")

    while True:
        data = conn.recv(1024)
        if not data:
            break
        reply = ""
        if len(data) < 2 or not data.startswith("x"):
            reply = b"xInvalid request: " + data + ". Send 'H' for help"
        elif data[1] == 'H':
            reply = b"xWelcome to the encryption service. Type 'E' + text to encrypt or 'D' + text to decrypt"
        elif data[1] == 'D':
            dec = decode(data[2:])
            reply = b"xD" + dec
        elif data[1] == 'E':
            enc = encode(data[2:])
            reply = b"xE" + enc
        else:
            reply = "xInvalid request: " + data + ". Send 'H' for help"
        conn.sendall(reply)
    conn.close()

while True:
    # blocking call, waits to accept a connection
    conn, addr = s.accept()
    print("[-] Connected to " + addr[0] + ":" + str(addr[1]))

    start_new_thread(client_thread, (conn,))

s.close()