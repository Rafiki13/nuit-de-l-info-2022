using UnityEngine;

namespace NDIGame
{
    public class Enemy : MonoBehaviour
    {
        [SerializeField] private int life;
        [SerializeField] private int speed;
        [SerializeField] private int defense;
        [SerializeField] private int magicDefense;
        [SerializeField] private int damages;

        private float maxDistance;
        private float distance;

        private int start;
        private int end;

        void Start()
        {
            Path current = GameManager.Instance.Current;

            start = current.StartingPoint;
            end = current[start].RandomNext;
            transform.position = current[start].Position;
        }
        
        void Update()
        {
            Path current = GameManager.Instance.Current;
            if(distance >= maxDistance)
            {
                start = end;
                end = current[start].RandomNext;

                distance = 0f;
                maxDistance = Vector2.Distance(current[start].Position, current[end].Position);
                return;
            }
            Vector3 endPoint = current[end].Position + Random.insideUnitCircle;
            transform.position = Vector2.Lerp(current[start].Position, current[end].Position, distance / maxDistance);
            distance += speed * Time.deltaTime;
        }

    }

}

