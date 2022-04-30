a = {1: "Yes", 2: "No", 3: "Maybe"}
b = []

for i in range(1, 4):
    b.append(b)
b = sorted(b)
for o in range (3):
    o = b[o]
    for p in range(1, 4):
        s = len(a[p])
        if o == s:
            print(a[p])