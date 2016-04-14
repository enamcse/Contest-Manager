#include <algorithm>
#include <cstdio>
#include <iostream>
#include <string.h>

using namespace std;

const int maxnode = 111111;
const int sigma_size = 52;
int ch[maxnode][sigma_size];
int val[maxnode];
int sz;

void init() {
  sz = 1;
  memset(ch[0], -1, sizeof(ch[0]));
}

int idx(char c) {
  if (c >= 'a' && c <= 'z')
    return c - 'a';
  else
    return c - 'A' + 26;
}

void insert(char *s) {
  int u = 0, n = strlen(s);
  for (int i = 0; i < n; i++) {
    int c = idx(s[i]);
    if (ch[u][c] == -1) {
      memset(ch[sz], -1, sizeof(ch[sz]));
      val[sz] = 0;
      ch[u][c] = sz++;
    }
    u = ch[u][c];
  }
  val[u]++;
}
int word_count(char *s) {
  int u = 0, n = strlen(s);
  for (int i = 0; i < n; i++) {
    int c = idx(s[i]);
    u = ch[u][c];
    if (val[u] == -1)
      return 0;
  }
  return val[u];
}

char words[200], sentence[200000];
string str;
int main(int argc, char const *argv[]) {
  freopen("input.txt", "r", stdin);
  int Test, n, m;
  scanf("%d", &Test);
  for (int kase = 0; kase < Test; ++kase) {
    scanf("%d", &n);
    init();
    for (int i = 0; i < n; ++i) {
      scanf("%s", words);
      int K = strlen(words);
      if (K > 2)
        sort(words + 1, words + K - 1);
      insert(words);
    }
    long long sum = 0;
    printf("Case %d:\n", kase + 1);
    scanf("%d", &m);
    getchar();
    for (int i = 0; i < m; ++i) {
      gets(sentence);
      sum = 1;
      char *P = strtok(sentence, " ");
      while (P != NULL) {
        int K = strlen(P);
        if (K > 2)
          sort(P + 1, P + K - 1);
        sum *= word_count(P);
        P = strtok(NULL, " ");
      }
      printf("%lld\n", sum);
    }
  }
  return 0;
}