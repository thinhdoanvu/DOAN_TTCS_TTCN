#include <stdio.h>
#include <math.h>
#include <queue>
#include <graphics.h>

#define MAX_SIZE 100
#define M_PI 3.14159265358979323846
#define RADIUS 20

// Khai bao ham
void drawframe();                                                                     // Ve khung giao dien
void drawButton(int left, int top, int right, int bottom, const char* label);        // Ve nut bam
bool isMouseHover(int left, int top, int right, int bottom);                         // Kiem tra chuot di chuyen
void handleMouseHover(int left, int top, int right, int bottom, const char* label, bool &hovered); // Xu ly khi chuot di chuyen
void drawgraph();                                                                     // Ve do thi
void clearGraph();                                                                   // Xoa do thi
void cleanGraph();                                                                   // Lam sach do thi
void bfs(int current, int end, int n, int& done);                                   // Thuat toan BFS
void BFS_display();                                                                  // Hien thi BFS
void openAndReadFile(const char* filePath);                                          // Mo va doc file
void handleClick(int x, int y);                                                      // Xu ly click chuot
void mouse();                                                                        // Xu ly chuot
void waitForKeypress();                                                              // Doi nhan phim

// Bien danh dau
bool isResetMode = false;      // Bien danh dau reset
bool isGraphLoaded = false;    // Bien xac dinh xem do thi da duoc load hay chua 
bool isBFSExecuted = false;    // Bien check bfs da chay lan nao chua
bool isAdjSymmetry = false;    // Bien kiem tra ma tran doi xung

int visited[MAX_SIZE];
int parent[MAX_SIZE];
int path[MAX_SIZE];
int len = 0;

// Do thi
int numV;                      // So dinh
struct Coord {                 // Toa do
    int x;
    int y;
    int label;
};
struct Coord vertices[MAX_SIZE];
FILE *fp;
char buffer[10];
int adjMatrix[MAX_SIZE][MAX_SIZE]; // Ma tran ke

// Ham ve button
void drawButton(int left, int top, int right, int bottom, const char* label) {
    setcolor(WHITE);
    setlinestyle(0, 1, 3);
    rectangle(left, top, right, bottom);
    settextstyle(10, 0, 1);

    char buffer[MAX_SIZE];
    strcpy(buffer, label);
    outtextxy(left + 10, top + 10, buffer);
}

// Ve khung do hoa
void drawframe() {
    setcolor(WHITE);
    setlinestyle(0, 1, 3);
    rectangle(10, 10, 550, 370);

    rectangle(10, 380, 550, 480);
    settextstyle(10, 0, 1);
    
    drawButton(567, 10, 700, 50, "Infor");
    drawButton(567, 70, 700, 110, "Load file");
    drawButton(567, 130, 700, 170, "Start");
    drawButton(567, 190, 700, 230, "Reset");
    drawButton(567, 250, 700, 290, "Delete");
    drawButton(567, 310, 700, 350, "Exit");
}

// Doc file toa do va ma tran ke
void openAndReadFile(const char* filePath) {
    fp = fopen(filePath, "r");
    if (fp == NULL) {
        printf("File not found!");
    }
    else {
        fscanf(fp, "%d", &numV);
        if (numV < 2 || numV > 15) {
	        printf("Invalid number of vertices. It must be between 2 and 15.\n");
	        return;
	    }
        for (int i = 0; i < numV; i++) {
            for (int j = 0; j < numV; j++) {
                fscanf(fp, "%d", &adjMatrix[i][j]);
            }
        }
        // Kiem tra doi xung
        isAdjSymmetry = true;
        for (int i = 0; i < numV; i++) {
            for (int j = 0; j < numV; j++) {
                if (adjMatrix[i][j] != adjMatrix[j][i]) {
                    isAdjSymmetry = false;
                    break;
                }
            }
        }
    }
    isGraphLoaded = true; // Dat co gia tri la true khi do thi duoc load
    fclose(fp);
}

// Ham ve hinh tron
void drawCircle(int x, int y, int label) {
    setcolor(WHITE);
    circle(x, y, RADIUS);
    char buffer[10];
    sprintf(buffer, "%d", label);
    outtextxy(x - 10, y - 10, buffer);
}

// Ham ve duong thang
void drawLine(int x1, int y1, int x2, int y2) {
    const int arrow_size = 10; // Kich thuoc cua mui ten
    
    // Tinh goc giua hai diem
    double angle = atan2(y2 - y1, x2 - x1);
    x1 = x1 + RADIUS * cos(angle);
    y1 = y1 + RADIUS * sin(angle);
    x2 = x2 - RADIUS * cos(angle);
    y2 = y2 - RADIUS * sin(angle);
    // Ve duong thang
    line(x1, y1, x2, y2);

    // Ve mui ten neu do thi co huong
    if(!isAdjSymmetry) {
        // Tinh toan cac diem cua mui ten
        int x3 = x2 - arrow_size * cos(angle - M_PI / 6);
        int y3 = y2 - arrow_size * sin(angle - M_PI / 6);
        int x4 = x2 - arrow_size * cos(angle + M_PI / 6);
        int y4 = y2 - arrow_size * sin(angle + M_PI / 6);
        // Ve mui ten
        line(x2, y2, x3, y3);
        line(x2, y2, x4, y4);
    }
}

// Ham ve canh
void drawEdges() {
    for (int i = 0; i < numV; i++) {
        for (int j = 0; j < numV; j++) {
            // Vo huong (ma tran doi xung)
            if (isAdjSymmetry) {
                if (adjMatrix[i][j] == 1 && i < j) {  
                    drawLine(vertices[i].x, vertices[i].y, vertices[j].x, vertices[j].y);
                }
            } 
            // Co huong
            else {
                if (adjMatrix[i][j] == 1) {
                    drawLine(vertices[i].x, vertices[i].y, vertices[j].x, vertices[j].y);
                }
            }
        }
    }
}

//Ve do thi
void drawgraph() {
    int vertexCount = 0;
    
    settextstyle(10, 0, 1);
    setcolor(WHITE);
    outtextxy(20, 390, "CLICK LEFT MOUSE BUTTON TO ADD A NODE");

    // Mang luu tru cac dinh (chi ve cac dinh truoc)
    while (vertexCount < numV && !kbhit()) {
        if (ismouseclick(WM_LBUTTONDOWN)) {
            int x = mousex();
            int y = mousey();

            if (x >= 10 + RADIUS && x <= 550 - RADIUS && y >= 10 + RADIUS && y <= 370 - RADIUS) {
                bool canPlace = true;

                // Kiem tra khoang cach voi cac dinh da co
                for (int i = 0; i < vertexCount; i++) {
                    double distance = sqrt(pow(vertices[i].x - x, 2) + pow(vertices[i].y - y, 2));
                    if (distance < 3 * RADIUS) {  // Khoang cach toi thieu de them dinh moi
                        canPlace = false;
                        break;
                    }
                }

                if (canPlace) {
                    // Gan vi tri va nhan cho dinh moi
                    vertices[vertexCount].x = x;
                    vertices[vertexCount].y = y;
                    vertices[vertexCount].label = vertexCount;  // Nhan dinh bat dau tu 0

                    drawCircle(x, y, vertexCount);  // Ve dinh
                    vertexCount++;  // Tang so dinh
                }
            }
            clearmouseclick(WM_LBUTTONDOWN);  // Xoa su kien chuot
        }
        delay(10);
    }

    setcolor(BLACK);
    outtextxy(20, 390, "CLICK LEFT MOUSE BUTTON TO ADD A NODE");
    setcolor(WHITE);
    drawEdges();  // Ve cac canh sau khi ve tat ca cac dinh
}

// Ham ve lai do thi
void redrawgraph() {
    for (int i = 0; i < numV; i++) {
        drawCircle(vertices[i].x, vertices[i].y, vertices[i].label);
    }
    drawEdges();
}

// Xoa do thi
void clearGraph() {
    isBFSExecuted = false;
    memset(visited, 0, sizeof(visited));
    memset(path, 0, sizeof(path));
    len = 0;
    cleardevice();
}

// Xoa do thi va dat lai trang thai
void cleanGraph() {
    memset(visited, 0, sizeof(visited));
    memset(path, 0, sizeof(path));
    len = 0;
    cleardevice();
    isGraphLoaded = false; // Gan ve false sau khi xoa do thi the hien chua nap
}

// Ham xu ly thao tac
void handleClick(int x, int y) {
    // Infor
    if(x >= 567 && x <= 700 && y >= 10 && y <= 50) {
        cleanGraph(); 
        drawframe();
        settextstyle(10, 0, 2);
        setcolor(RED);
        outtextxy(80, 50, "BFS Visualization for Graphs");

        settextstyle(8, 0, 1);
        setcolor(WHITE);
        outtextxy(80, 110, "Supervisor: M.Sc. DOAN VU THINH");
        outtextxy(80, 160, "Student: TRAN DUC NGAN");
        outtextxy(80, 210, "Student ID: 64131460");

        settextstyle(6, 0, 1);
        setcolor(YELLOW);        
        outtextxy(80, 270, "Thank you for reviewing the project!");
    }
    
    // Load file
    if(x >= 567 && x <= 700 && y >= 70 && y <= 110) {
        OPENFILENAME ofn;
        TCHAR szFile[MAX_PATH];
        TCHAR szFolder[MAX_PATH];
        // Lay duong dan den thu muc hien tai cua chuong trinh
        GetCurrentDirectory(MAX_PATH, szFolder);
        ZeroMemory(&ofn, sizeof(OPENFILENAME));
        ofn.lStructSize = sizeof(OPENFILENAME);
        ofn.hwndOwner = NULL;
        ofn.lpstrFile = szFile;
        ofn.lpstrFile[0] = '\0';
        ofn.nMaxFile = sizeof(szFile);
        ofn.lpstrFilter = TEXT("All Files (*.*)\0*.*\0");
        ofn.nFilterIndex = 1;

        ofn.lpstrInitialDir = szFolder; // Su dung thu muc hien tai lam thu muc mac dinh
        if (GetOpenFileName(&ofn)) {
            const char* filePath = ofn.lpstrFile;
            isAdjSymmetry = true;
            openAndReadFile(filePath);
            ZeroMemory(szFile, sizeof(szFile));
        }
        clearGraph();
        drawframe();
        drawgraph();
    }

    // Start
    if (x >= 567 && x <= 700 && y >= 130 && y <= 170) {    
        // Neu do thi da duoc tai
        if (isGraphLoaded) {
            // Neu BFS chua duoc chay, thi chay BFS
            if (!isBFSExecuted) {
                BFS_display(); // Chay BFS
                isBFSExecuted = true; // Danh dau la BFS da chay
            } else {
                clearGraph();      // Xoa do thi hien tai
                drawframe();       // Ve lai khung
                redrawgraph();     // Ve lai do thi
                BFS_display();     // Chay lai BFS
            }
        } else {
            setcolor(WHITE); 
            cleanGraph();          // Xoa do thi
            drawframe();           // Ve lai khung
            outtextxy(195, 120, "NO GRAPH TO START");  // Khong co do thi de bat dau
            outtextxy(60, 170, "CLICK THE 'Load file' BUTTON TO ADD GRAPH");  // Nhan nut 'Load file' de tai do thi
        }
    }
    
    // Reset
    if (x >= 567 && x <= 700 && y >= 190 && y <= 230) {
        if (isGraphLoaded) {
            isBFSExecuted = false; // Dat lai trang thai BFS
            cleanGraph();          // Xoa do thi hien tai
            drawframe();           // Ve lai khung
            drawgraph();           // Ve lai do thi
        } else {
        	cleanGraph();  // Xoa do thi
        	drawframe();   // Ve khung
            setcolor(WHITE);
            settextstyle(10, 0, 1);
            outtextxy(195, 120, "NO GRAPH TO RESET");  // Khong co do thi de dat lai
            outtextxy(60, 170, "CLICK THE 'Load file' BUTTON TO ADD GRAPH");
        }
    }
    
    // Delete
    if (x >= 567 && x <= 700 && y >= 250 && y <= 290) {
        cleanGraph();  // Xoa do thi
        drawframe();   // Ve khung
        outtextxy(180, 120, "DATA HAS BEEN DELETED");  // Du lieu da bi xoa
        outtextxy(60, 170, "CLICK THE 'Load file' BUTTON TO ADD GRAPH");  // Click vao nut 'Load file' de them do thi
    }

    // Exit
    if (x >= 567 && x <= 700 && y >= 310 && y <= 350) {
        closegraph();  // Dong cua so do thi
    }
}

void bfs(int start, int end, int n) {
    if (start < 0 || start >= n || end < 0 || end >= n) {
        setcolor(WHITE);
        settextstyle(10, 0, 1);
        outtextxy(20, 390, "INVALID START OR END NODE");
        return;
    }

    std::queue<int> q;
    memset(visited, 0, sizeof(visited));
    memset(parent, -1, sizeof(parent));

    q.push(start);
    visited[start] = 1;

    // Hien thi duong tim kiem BFS
    while (!q.empty()) {
        int current = q.front();
        q.pop();

        setcolor(RED);
        circle(vertices[current].x, vertices[current].y, 20);
        delay(500);

        if (current == end) {
            break;
        }

        for (int i = 0; i < n; i++) {
            if (adjMatrix[current][i] == 1 && !visited[i]) {
                q.push(i);
                visited[i] = 1;
                parent[i] = current;
                
                // Ve duong noi tu diem tiep tuyen va mui ten mau do
                setcolor(RED);
                drawLine(vertices[current].x, vertices[current].y, vertices[i].x, vertices[i].y);

                delay(400);
            }
        }
    }

    // Hien thi duong di
    if (visited[end]) {
        // Xay dung duong di
        int path[MAX_SIZE];
        int len = 0;
        for (int v = end; v != -1; v = parent[v]) {
            path[len++] = v;
        }

        setcolor(YELLOW);  // Duong di mau vang
        for (int i = len - 1; i > 0; i--) {
            // Ve lai duong mui ten
            drawLine(vertices[path[i]].x, vertices[path[i]].y, vertices[path[i - 1]].x, vertices[path[i - 1]].y);
            delay(200);
        }

        for (int i = 0; i < len; i++) {
            setcolor(YELLOW);
            circle(vertices[path[i]].x, vertices[path[i]].y, 20);
            delay(100);
        }
        
        settextstyle(10, 0, 1);
        setcolor(WHITE);
        outtextxy(20, 390, "PATH: ");
        for (int i = len - 1; i >= 0; i--) {
            sprintf(buffer, "%d", path[i]);
            outtextxy(120 + (len - 1 - i) * 30, 390, buffer);
        }
    }
    else {
        settextstyle(10, 0, 1);
        setcolor(WHITE);
        outtextxy(20, 390, "NO PATH FOUND");
    }
}

void BFS_display() {
    int start, end;
    printf("Enter the starting vertex: ");
    scanf("%d", &start);
    printf("Enter the ending vertex: ");
    scanf("%d", &end);
    bfs(start, end, numV);
}

// Kiem tra hover
bool isMouseHover(int left, int top, int right, int bottom) {
    int x = mousex();
    int y = mousey();
    if (x >= left && x <= right && y >= top && y <= bottom) {
        return true; // Chuot di chuyen vao trong vung cua button
    }
    return false; // Chuot di chuyen ra khoi vung cua button
}

// Xu ly khi hover vao button
void handleMouseHover(int left, int top, int right, int bottom, const char* label, bool &hovered) {
    char buffer[MAX_SIZE]; // Khai bao buffer luu du lieu chuoi
    if (isMouseHover(left, top, right, bottom)) {
        setcolor(RED);
        rectangle(left, top, right, bottom);
        settextstyle(10, 0, 1);

        sprintf(buffer, "%s", label); // Dinh dang chuoi duoc luu vao buffer
        outtextxy(left + 10, top + 10, buffer); // Hien thi noi dung cua buffer

        hovered = true;
    } else if (hovered) {
        setcolor(WHITE);
        rectangle(left, top, right, bottom);
        settextstyle(10, 0, 1);
        
        sprintf(buffer, "%s", label); 
        outtextxy(left + 10, top + 10, buffer);
        hovered = false;
    }
}

// Ham xu ly con tro chuot
void mouse() {
    int x;
    int y;
    // Bien danh dau hover
    bool hovered = false;
    bool hovered1 = false; 
    bool hovered2 = false; 
    bool hovered3 = false; 
    bool hovered4 = false; 
    bool hovered5 = false; 
    while (!kbhit()) {
        if (ismouseclick(WM_MOUSEMOVE)) {
            getmouseclick(WM_MOUSEMOVE, x, y);
            handleMouseHover(567, 10, 700, 50, "Infor", hovered);
            handleMouseHover(567, 70, 700, 110, "Load file", hovered1);
            handleMouseHover(567, 130, 700, 170, "Start", hovered2);
            handleMouseHover(567, 190, 700, 230, "Reset", hovered3);
            handleMouseHover(567, 250, 700, 290, "Delete", hovered4);
            handleMouseHover(567, 310, 700, 350, "Exit", hovered5);
            clearmouseclick(WM_MOUSEMOVE);
        }
        if (ismouseclick(WM_LBUTTONDOWN)) {
            getmouseclick(WM_LBUTTONDOWN, x, y);
            handleClick(x, y);
            clearmouseclick(WM_LBUTTONDOWN);
        }
    }
}

// Ham main
int main() {
    initwindow(720, 500);
    drawframe();
    mouse();
    
    getch();
    closegraph();
    
    return 0;
}
